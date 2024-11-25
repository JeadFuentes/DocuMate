<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview PDF</title>
    <style>
        iframe {
            width: 100%;
            height: 600px;
            border: none;
        }
        .download-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h1>Preview Your PDF</h1>

    <!-- Display the PDF for preview -->
    <iframe src="{{ $pdfUrl }}" title="PDF Preview"></iframe>

    <!-- Add a button for downloading the PDF -->
    <a href="{{ $pdfUrl }}" class="download-btn" download="CustomerReport.pdf">
        Download PDF
    </a>

</body>
</html>
