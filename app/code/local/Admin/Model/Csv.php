<?php
class Admin_Model_Csv extends Core_Model_Abstract
{
    public function getCsv($model)
    {
        $filename = "export.csv"; // Name of the CSV file

        // Set headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Pragma: no-cache');
        header('Expires: 0');

        // Open output buffer to capture CSV output
        $fp = fopen('php://output', 'w');

        // Fetch headers (column names)
        $firstProduct = $model[0]->getData(); // Get first product data
        fputcsv($fp, array_keys($firstProduct)); // Write headers to CSV

        // Write each product data row
        foreach ($model as $data) {
            fputcsv($fp, $data->getData());
        }

        fclose($fp);
    }
}
