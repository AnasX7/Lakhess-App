<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 210mm;
            /* A4 width */
            height: auto;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
            /* Optional border for visibility */
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            font-size: 12px;
            line-height: 1.5;
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $summary->title }}</h1>
            <p>Date: {{ date('Y-m-d') }}</p>
        </div>

        <div class="content">
            <p>{{ $summary->content }}</p>
        </div>

        <div class="footer">
            {{-- I'm tired man. change this ;) --}}
            <p>Page Footer - Your Company Name</p>
        </div>
    </div>
</body>

</html>
