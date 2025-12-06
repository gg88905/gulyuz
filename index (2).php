<?php
session_start();
$_SESSION['ismi'] = "Gulyuz";
$_SESSION['yoshi']=19;
$_SESSION['manzili']="Samarqand";
$_SESSION['email'] = "mizrobqulova@gmail.com";
$_SESSION['kasbi'] = "dasturchi";
$_SESSION['millati'] = "uzbek";
$_SESSION['telefon'] = "+998941152517";
echo "<h2>Session o'zgaruvchilariga misollar:</h2>";
echo "1. Ismi: " . $_SESSION['ismi'] . "<br>";
echo "2. Yoshi: " . $_SESSION['yoshi'] . "<br>";
echo "3. Manzili: " . $_SESSION['manzili'] . "<br>";
echo "4. Kasbi: " . $_SESSION['email'] . "<br>";
echo "5. Email: " . $_SESSION['kasbi'] . "<br>";
echo "6. Telefon: " . $_SESSION['telefon'] . "<br>";
?>