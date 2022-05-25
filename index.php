<?php
/**
* Write a production-ready function in PHP that sums the numbers in a file and outputs details of the results.
*
* @author     Jerry Jones <jerryjones@live.in>
*
* @param    string  $pathtofile
* @return   integer $output
* @access   public
*/
// Enabling strict mode for data type
declare(strict_types=1);
/* Enabling error reporting to show all error for development.
On production error reporting should be off and enable logging the error
*/
error_reporting(E_ALL);
//global $processed;

function sum(string $pathToFile)//: string
{
    $processed = array();

    if(file_exists($pathToFile)){
        //store processed files in an array to avoid repetation.
        array_push($processed, strtolower($pathToFile));

        //read the file for further processing
        $contents = file($pathToFile, FILE_IGNORE_NEW_LINES);
        $process = extractFileName($contents);
        $fileGroup = array_unique($process['file']);

        if(count($fileGroup) > 1){ //check if there are multiple files in a text file
            $i = 1;
            foreach($fileGroup as $file){

                if(in_array(strtolower($file), $processed)){ //skip if already processed
                    echo 'i was in<br>';
                    continue;
                }

                array_push($processed, strtolower($file."-{$i}")); //add processed files into array
                // $output = 'ok';
                $i++;
                echo $file;
                echo ' --i was out<br>';
            }
            // $output = $fileGroup;
        }else{
            if(!in_array(strtolower($fileGroup[0]), $processed)){ //check if processed
                array_push($processed, strtolower($fileGroup[0])); //add processed files into array
            }
            
            // $output = count($fileGroup);
        }
    }else{
        die("ERROR: Unable to open file!");
    }

    // return $output;
    //return $processed;
}

function extractFileName(array $contents) {
    $output = array();
    $fileName = array();

    foreach($contents as $value)
    {
        if(!is_numeric($value)){
            $path_parts = pathinfo($value);
            if($path_parts['extension'] == 'txt'){
                array_push($fileName, $value);
            }
        }
    }
    $output['file'] = $fileName;
    $output['sum'] = array_sum($contents);
    return $output;
}

$output = sum('./uploads/A.txt');
echo"<pre>";
print_r($output);
// print_r(extractFile());