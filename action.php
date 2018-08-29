<?php
include('db.php');
session_start();
$actionType = "";
if(isset($_POST['actionType'])){
$actionType = $_POST['actionType'];	
}
if($actionType == "registration") {
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];

global $dbConnect;
	
	$query = $dbConnect->prepare("INSERT INTO registration (username, firstname, lastname,email,mobile,password) VALUES (?, ?, ?, ?, ?, ?)");
	$query->bindValue(1, $username, PDO::PARAM_STR); 
	$query->bindValue(2, $firstname, PDO::PARAM_STR);
	$query->bindValue(3, $lastname, PDO::PARAM_STR);
	$query->bindValue(4, $email, PDO::PARAM_STR);
	$query->bindValue(5, $mobile, PDO::PARAM_STR);
	$query->bindValue(6, $password, PDO::PARAM_STR);
	
	
	try
	{
		
		$result = $query->execute();
		if($result == true){
			echo "success";
		} else {
			echo "failed";
		}
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}

if ($actionType == "userLogin") {
	$email = $_POST['email'];
	$password = $_POST['password'];	
	$query= $dbConnect->prepare("SELECT * FROM registration WHERE email = '$email' AND password = '$password'");

	$query->bindValue (1,$email);
	$query->bindValue (2,$password);
	try
	{
		$query->execute();
		$result = $query->rowCount();
		if($result == 1){
			
			$_SESSION['email'] = $email;
		
			echo "success";
		} else {
			echo "failed";
		}
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}
if($actionType == "logout") {
	unset($_SESSION['email']);
	echo "Processing";
	echo'<script>location.reload(true);</script>';
}
if($actionType == "delete") {
	$email = $_POST['email'];
	global $dbConnect;
	
	$query = $dbConnect->prepare("DELETE FROM registration WHERE email = ?");
	$query->bindValue(1, $email);
	
	try
	{
		$result = $query->execute();
		echo $result;
	} 
	catch(PDOException $e)
	{
		die($e->getMessage());
	}
}
?>

