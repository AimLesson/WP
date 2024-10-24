<?php

namespace App\Imports;

use App\Models\NoKatalog;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;  // Add this import to skip header row

class NoKatalogImport implements ToModel, WithHeadingRow  // Implement WithHeadingRow interface
{
    /**
     * @param array $row
     * 
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    try {
        Log::info('Inserting data: ' . json_encode($row));

        return new NoKatalog([
            'no_katalog'   => $row['no_katalog'],
            'nama_katalog' => $row['nama_katalog'],
            'price'        => $row['price'],
        ]);
    } catch (\Exception $e) {
        Log::error('Error processing row: ' . json_encode($row) . ' - ' . $e->getMessage());
        throw $e;
    }
}
}
