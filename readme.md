/\*\*

- Write a production-ready function in PHP that sums the numbers in a file and outputs details of the results.
-
- @author Jerry Jones <jerryjones@live.in>
-
- @param string $pathtofile
- @return integer $output
- @access public
  \*/

Write a production-ready function in PHP that sums the numbers in a file and outputs details of the results. The function will receive as input the path to a single file. Each line of the file will contain either a number or a relative path to another file. For each file processed, output the file path and the sum of all of the numbers contained both directly in the file and in any of the sub files listed in the file (and their sub files, etc).

Solution:

1. Check if file exist or not. If no file found, skip the process and return null.
2. Get the contents from the file and store it in array.
3. Store the file name and sum of the numbers into an associative array.
4. Loop through the content and check if file name is present in the content.
5. If present, check if the file name is already exist in the output($result) array.
6. Call the function (sumFiles) till all files are read and processed.
7. Output the result as array.
