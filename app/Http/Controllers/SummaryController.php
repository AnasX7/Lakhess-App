<?php

namespace App\Http\Controllers;

use OpenAI\Laravel\Facades\OpenAI;
use Smalot\PdfParser\Parser;
use App\Models\Summary;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    //
    public function generate(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf', // Validate PDF upload
            'folder_id' => 'nullable|exists:folders,id',
        ]);

        try {
            if ($request->input('folder_id') === null) {
                return redirect()->route('dashboard')->with('error', 'Select a folder.');
            }

            // Parse the PDF file
            $filePath = $request->file('file')->getPathname();
            $pdfParser = new Parser();
            $pdf = $pdfParser->parseFile($filePath);

            // Extract text from the PDF
            $pdfText = $pdf->getText();

            if (empty(trim($pdfText))) {
                return redirect()->route('dashboard')->with('error', 'Unable to extract text from the PDF.');
            }

            // Simplify the text
            $simplifiedText = $this->simplifyText($pdfText);

            // Call OpenAI API to generate summary
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4o-mini',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant that summarizes text.'],
                    ['role' => 'user', 'content' => 'Summarize this lecture in a comprehensive manner covering all its aspects in an organized and coordinated way: ' . $simplifiedText],
                ],
                'max_tokens' => 10000,
                'temperature' => 0.7,
            ]);

            // Extract the summary text from the API response
            $summaryText = $response['choices'][0]['message']['content'] ?? 'Unable to generate summary.';



            // Save the summary in the database
            $summary = Summary::create([
                'title' => $request->input('title'),
                'content' => $summaryText,
                'folder_id' => $request->input('folder_id'),
            ]);

            // Redirect to the folder page
            return redirect()->route('folders.show', $summary->folder_id)
                ->with('success', 'Summary created successfully!');

        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('error', 'Failed to process the file or generate summary. Please try again.');
        }

    }

    private function simplifyText(string $text): string
    {
        // Step 1: Remove common unnecessary sections
        $text = preg_replace('/(Page \d+|Header|Footer|Copyright|All rights reserved)/i', '', $text);

        // Step 2: Remove excessive whitespace
        $text = preg_replace('/\s+/', ' ', $text);

        return trim($text);
    }

    public function show($summaryId)
    {
        $summary = Summary::findOrFail($summaryId);

        return view('app.summary', compact('summary'));
    }

    public function index()
    {
        $summaries = [];

        // Eager load summaries with folders
        $folders = auth()->user()->folders()->with('summaries')->get();

        foreach ($folders as $folder) {
            foreach ($folder->summaries as $summary) {
                $summaries[] = $summary; // Use shorthand for array push
            }
        }

        return view('app.summaries', compact('summaries'));
    }
}
