<?php
/**
*   Write a production-ready function in PHP that sums the numbers in a file and outputs details of the results.
*
*   @author     Jerry Jones <jerryjones@live.in>
*
*   @param    string  $pathtofile
*   @return   array $output
*   @access   public
*/
// Enabling strict mode for data type
declare(strict_types=1);
/*  Enabling error reporting to show all error for development.
    On production error reporting should be off and enable logging the error
*/
error_reporting(E_ALL);

function sumFiles(string $pathToFile, $results = array()): array
{
    if(file_exists($pathToFile)){
        $contents = file($pathToFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        // Calculate the sum and store it in array for final output
        $results[$pathToFile] = array_sum($contents);

        // Loop through the contents of the file, get file name if presente
        for ($i=0; $i < count($contents); $i++) {
            if (!is_numeric($contents[$i]) && !array_key_exists($contents[$i], $results)) {
                $results = sumfiles($contents[$i], $results);
            }
        }
    }
    
    return $results;
}

$output = sumFIles('./uploads/a.txt');
echo"<pre>";
print_r($output);