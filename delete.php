<?php
include('connection.php');
  if(isset($_REQUEST['del-id']))
  {
	$id = $_REQUEST['del-id'];
	$del = "delete from product where id = '$id'";
	//print_r($del);
	if ($con->query($del) === true) 
	{
		//echo "Deleted Successfully";
		header('location:showdata.php');
	}
	else
	{
		echo "Error";
	}
  }
  else
  {
	header('location:showdata.php');
  }
?>