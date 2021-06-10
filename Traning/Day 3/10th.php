<?php

if(isset($_POST['member'])){
    $member = $_POST['member'];
    $pers = $_POST['pers'];
    $conx = mysqli_connect("localhost" ,"root", "" ,"MyDataBase");

    // $connect = new PDO("mysql:host=localhost ; dbname=MyDataBase","root" ,"")
    
    $query = "INSERT INTO `MyTable`(`member`, `pers`) VALUES ('$member','$pers')";
    $result = mysqli_query($conx,$query);

    if ($result == true) {
        echo "<h3> inserted </h3>"
    }

}


?>