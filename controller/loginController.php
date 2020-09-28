<?php 
include '../model/user.php';
include '../model/conexion.php';
$femail=$_POST ['femail'];
$fpassword=$_POST ['fpassword'];

// echo "el email es {$femail} y la contraseña es {$fpassword}";
// creo objeto user (la primera en mayúscula porque es una clase)
$user=new User($femail, $fpassword);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email=? and password=?";
$smt=$pdo->prepare($sql);
$smt->bindParam(1, $femail);
$smt->bindParam(2, $fpassword);
$smt->execute();
$numUser=$smt->rowCount();
echo $numUser;
?>