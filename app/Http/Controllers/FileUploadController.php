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
            'file' => 'required|mimes:csv,txt|max:5120', // Verhoog de maximale grootte tot 5MB (5120 KB)
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
        // Open the file and read its contents
        $path = $file->getRealPath();
        $file = fopen($path, 'r');
        $header = fgetcsv($file); // Lees de header

        while (($row = fgetcsv($file)) !== FALSE) {
            // Maak een associatief array van de rij met behulp van de header
            $data = array_combine($header, $row);

            // Maak een nieuwe bestelling aan met de gegevens uit het CSV-record
            Order::create([
                'order_number' => $data['order_number'],
                'order_line_number' => $data['order_line_number'],
                'product_name' => $data['product_name'],
                'product_height_cm' => $data['product_height'], // Assuming you want to keep the original height column name
                'product_weight_g' => $data['product_weight'], // Assuming you want to keep the original weight column name
                'customer_name' => $data['customer_name'],
                'customer_address' => $data['customer_address'],
                'customer_city' => $data['customer_city'],
                'customer_postal_code' => $data['customer_postal_code'],
                'customer_phone' => $data['customer_phone'],
            ]);
        }

        fclose($file);
    }
}
