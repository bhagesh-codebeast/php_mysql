<?php

if(isset($_POST['submit'])){
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone_num'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$course=$_POST['course'];
	
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="demo";
	
	$connect = mysqli_connect($servername, $username,$password,$dbname);
	
	if(!$connect){
		echo"ERROR Could not connect to database demo ".mysqli_connect_error();
	}else{
		echo"connected successfully to database demo <br>";
	}
	//create database
	//$sql1="CREATE DATABASE demo;";
	//create table
	//$sql2="CREATE TABLE demo_table(
	//fname VARCHAR(10) NOT NULL PRIMARY KEY,
	//mname VARCHAR(10) NOT NULL,
	//lname VARCHAR(10),
	//phone_num BIGINT(11) NOT NULL,
	//dob DATE NOT NULL,
	//gender VARCHAR(1) NOT NULL,
	//address VARCHAR(50) NOT NULL,
	//course VARCHAR(50) NOT NULL,
	//creat_time DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
	//update_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	//);";
	// insert data from form
	$sql3="INSERT INTO demo_table(fname,mname,lname,phone_num,dob,gender,address,course,creat_time,update_time)
	VALUES('$fname','$mname','$lname','$phone','$dob','$gender','$address','$course',NOW(),NOW());";
	
	if(mysqli_query($connect,$sql3)){
		$last_id = mysqli_insert_id($connect);
		echo"New Record Successfully Added with ID ".$last_id."<br>get some sleep now $lname $fname<br>";
	}else{
		echo"ERROR: ".mysqli_error($connect)."<br>stop messing around with my page $lname $fname<br>";
	}
	mysqli_close($connect);
	
}else{
	echo"error in form submission. <br>";
}
?>