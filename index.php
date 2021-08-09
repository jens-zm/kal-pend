<?php 
function csvtojson($file,$delimiter)
{
    if (($handle = fopen($file, "r")) === false)
    {
            die("can't open the file.");
    }

    $csv_headers = fgetcsv($handle, 4000, $delimiter);
    $csv_json = array();

    while ($row = fgetcsv($handle, 4000, $delimiter))
    {
            $csv_json[] = array_combine($csv_headers, $row);
    }

    fclose($handle);
    return json_encode($csv_json);
}

$kalPend;

if(!isset($_GET['tahunajar'])){
echo "tidak ada data";
}else{
	if($_GET['tahunajar'] == "2021-2022"){
    $kalPend = csvtojson("kalender.csv", ",");
    echo $kalPend;
}elseif ($_GET['tahunajar'] == "2022-2023") {
	echo "data 2022-2023";
}else{
	echo "tidak ada query yang cocok";
}


}  


 ?>