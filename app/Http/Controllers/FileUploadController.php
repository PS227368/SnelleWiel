<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;

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
            [$errors, $successes] = $this->processFile($file);

            if (count($errors) > 0) {
                return redirect()->back()->withErrors($errors)->with('successes', $successes);
            }
        }

        return redirect()->back()->with('success', 'Bestand succesvol geüpload');
    }

    private function processFile($file)
    {
        $errors = [];
        $successes = [];
        // Open het bestand en lees de inhoud
        $file = fopen($file, 'r');
        $header = fgetcsv($file); // Lees de header

        while (($row = fgetcsv($file)) !== FALSE) {
            // Maak een associatief array van de rij met behulp van de header
            $data = array_combine($header, $row);

            // Controleer of het ordernummer al bestaat
            $existingOrder = Order::where('order_number', $data['order_number'])->first();

            if ($existingOrder) {
                $errors[] = "Ordernummer {$data['order_number']} bestaat al en kan niet opnieuw worden toegevoegd.";
            } else {
                // Maak een nieuwe bestelling aan met de gegevens uit het CSV-record
                Order::create([
                    'order_number' => $data['order_number'],
                    'order_line_number' => $data['order_line_number'],
                    'product_name' => $data['product_name'],
                    'product_height_cm' => $data['product_height_cm'], // Assuming you want to keep the original height column name
                    'product_weight_g' => $data['product_weight_g'], // Assuming you want to keep the original weight column name
                    'customer_name' => $data['customer_name'],
                    'customer_address' => $data['customer_address'],
                    'customer_city' => $data['customer_city'],
                    'customer_postal_code' => $data['customer_postal_code'],
                    'customer_phone' => $data['customer_phone'],
                    'status' => $data['status'],
                ]);
                $successes[] = "Ordernummer {$data['order_number']} is succesvol toegevoegd.";
            }
        }

        fclose($file);
        return [$errors, $successes];
    }

}
