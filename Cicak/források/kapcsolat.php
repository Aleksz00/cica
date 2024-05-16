<?php
define("SERVERNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","cicak");

$conn=new mysqli(SERVERNAME,USERNAME,PASSWORD,DBNAME);
if($conn->connect_error){
    die("Sikertelen kapcsolat:".$conn->connect_error);
}
$sql="SELECT * FROM cicak";
$result=$conn->query($sql);
if($result->num_rows>0){
    $data =array();
    while($row = $result->fetch_assoc()){
        $data[]=$row;
    }
    $json_data=json_encode($data,JSON_PRETTY_PRINT);
    $file='data.json';
    file_put_contents($file,$json_data);
    echo"JSON fájl sikeresen létrehozva";;
}else
{
    echo"Nincsenek adatok az adatbázisban";
}
$conn->close();
?>