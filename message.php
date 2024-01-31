<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$fullname=$_POST["imeiprezime"];
$to=$_POST["to"];
$date=$_POST["datum"];
$time=$_POST["cas"];
$poraka=$_POST["poraka"];

$servername='localhost';
$username="root";
$password="usbw";
$databasename="student";
//create connection
$conn= new sqli($servername,$username,$password,$databasename);

//chech connection
if(!$conn){
    die("Connection failed: " . $conn->connect_error);
}else {
//Connected succesfully

$sql = "INSERT INTO student (ime, prezime, indeks, nastani, fakultet) VALUES ('$ime', '$prezime', '$indeks', '$nastani', '$fakultet')";
$result = mysqli_query($connection, $sql);

// Проверка за грешки при внесувањето
if ($result) {
    echo "Студентот е успешно внесен.";
} else {
    echo "Грешка при внесување на студент: " . mysqli_error($connection);
}
}
}
// Затвори поврзување со базата
$conn->close();
?>