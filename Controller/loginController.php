<?php
include '../Model/user.php';
include '../Model/conexion.php';
$femail=$_POST['femail'];
$fpassword=$_POST['fpassword'];
//echo "El email es: {$femail} y la contraseña es {$fpassword}";
// Creo el objeto User
$user=new User($femail, $fpassword);
echo $user->getEmail();
echo "<br>";
echo $user->getPassword();
$sql="SELECT * FROM tbl_user WHERE email=? AND password=?";
$smt=$conn->prepare($sql);
$smt->bindParam(1, $femail);
$smt->bindParam(2, $fpassword);
$smt->execute();
$numUser=$smt->rowCount();
echo $numUser;
if ($numUser == 1) {
    header("Location: ../View/home.php");
} else {
    header("Location: ../View/vista_login.html?error=1");
}
?>