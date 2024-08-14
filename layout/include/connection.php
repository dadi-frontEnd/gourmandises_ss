<?php

const HOST='localhost';
const USER='root';
const PASS='';
const DBASE='ecoin';
 $connect = mysqli_connect(HOST,USER,PASS,DBASE);
 // Vérification de la connexion
if ($connect->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>