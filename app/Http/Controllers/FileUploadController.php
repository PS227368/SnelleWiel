<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        return view('upload');
    }

    public function upload(Request $request)
    {
        // Valideer het geüploade bestand
        $validatedData = $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048', // Valideer het geüploade bestand als CSV of tekstbestand
        ]);

        // Verwerk het geüploade bestand
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Verwerk het geüploade bestand en sla de gegevens op in de database
            $this->processFile($file);
        }

        return redirect()->back()->with('success', 'Bestand succesvol geüpload');
    }

    private function processFile($file)
    {
        $handle = fopen($file->getRealPath(), 'r');
        $header = true;

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {
            if ($header) {
                $header = false;
            } else {
                Order::create([
                    'order_number' => $row[0],
                    'order_line_number' => $row[1],
                    'product_name' => $row[2],
                    'product_height' => $row[3],
                    'product_weight' => $row[4],
                    'customer_name' => $row[5],
                    'customer_address' => $row[6],
                    'customer_city' => $row[7],
                    'customer_postal_code' => $row[8],
                    'customer_phone' => $row[9],
                ]);
            }
        }

        fclose($handle);
    }
}
