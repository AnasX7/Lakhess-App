<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'folder_color' => 'required|string|size:7',
        ]);

        Folder::create([
            'name' => $request->input('folder_name'),
            'color' => $request->input('folder_color'),
            'user_id' => auth()->id(),
        ]);

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Folder created successfully!');
    }

    public function show(string $folderId)
    {
        $folder = Folder::findOrFail($folderId);

        if ($folder->user->id !== auth()->user()->id) {
            abort('403');
        }

        return view('app.folders', compact('folder'));
    }

    public function destroy(string $id)
    {
        $folder = Folder::findOrFail($id);
        $folder->delete();

        return redirect()->route('dashboard')->with('success', 'Folder deleted successfully!');

    }

}
