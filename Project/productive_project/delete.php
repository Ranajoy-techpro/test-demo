<?php
include('connection.php');
  if(isset($_REQUEST['del-id']))
  {
	$id = $_REQUEST['del-id'];
	$ser = "select * from product where id = $id";
	$res = $con->query($ser);
	$row = mysqli_fetch_array($res);
	if ($old_images = $row['product_image'])
	{
		$del = "delete from product where id = '$id'";
		unlink("./Image/$old_images");
	}
	//$old_images = $row['product_image'];
	//$del = "delete from product where id = '$id'";

	//print_r($del);
	if ($con->query($del) === true) 
	{
		//echo "Deleted Successfully";
		header('location:index.php');
	}
	else
	{
		echo "Error";
	}
  }
   else
  {
	header('location:index.php');
  }
?>