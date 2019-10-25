<?php
	include("connection.php");
	if(isset($_POST['add']))
	{
		$productname = $_POST['pro_name'];
		$productcategory = $_POST['pro_cat'];
		$productstatus = $_POST['status'];
		$productimage = $_POST['fileupload'];
		$date = date("Y-m-d H:i:s");
		
		//$errorproductname = $errorproductcategory = "";
		/*if($productname == "" || $productcategory == "" || $productstatus == "" || $productimage == "")
		{
			echo "<script type='text/javascript'>alert('Plz input all field');location = 'product_add.php';</script>";
		}*/

		$target_dir = "./Image/";
		$file = $_FILES['fileupload']['name'];
		$path = pathinfo($file);
		$filename = $path['filename'];
		$ext = $path['extension'];
		$new_file_name=$filename.rand(0000,9999).time().'.'.$ext;
		$temp_name = $_FILES['fileupload']['tmp_name'];
		$path_filename_ext = $target_dir.$new_file_name;
		
		if(move_uploaded_file($temp_name,$path_filename_ext)) 
		{
			$append = "insert into product(product_name,product_category,product_status,product_image,created_date)values('$productname','$productcategory','$productstatus','$new_file_name','$date')";
			if($con->query($append) === true)
			{
				header('location:index.php');
			}
			else
			{
				echo "<script type='text/javascript'>alert('Error found');location = 'product_add.php';</script>". $append .$con->error;
			}
		}
	}
	
	$con->close();
?>