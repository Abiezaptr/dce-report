<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory; // Import this class for Excel processing

class UploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx|max:2048',
        ]);

        $file = $request->file('file');
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$originalName}.{$extension}";

        // Delete existing file if it exists
        if (file_exists(base_path("uploads/{$fileName}"))) {
            unlink(base_path("uploads/{$fileName}"));
        }

        // Store the uploaded file in public/uploads directory
        $file->move(base_path('uploads'), $fileName);

        // Process the uploaded Excel file
        $excelFilePath = base_path("uploads/{$fileName}");
        $spreadsheet = IOFactory::load($excelFilePath); // Load the Excel file

        // Execute the .bat file
        $batFilePath = base_path('uploads/your_script.bat'); // Change the path accordingly
        exec($batFilePath);

        // Copy dashboard.png to the uploads directory
        $sourceImagePath = base_path('uploads/dashboard.png'); // Change the path accordingly
        $destinationImagePath = base_path("uploads/dashboard.png");
        copy($sourceImagePath, $destinationImagePath);

        return response()->json([
            'message' => 'Upload and batch execution successful',
            'file_name' => $fileName, // Pass the file name to the response
        ]);
    }
}
