<?php
include('connection.php');
  if(isset($_REQUEST['mod-id'])) 
  {
	    $id = $_REQUEST['mod-id'];
		$ser = "select * from product where id = $id";
		$res = $con->query($ser);
		$row = mysqli_fetch_array($res);
	   
		if(isset($_REQUEST['mod']))
		{
			$productname = $_REQUEST['pro_name'];
		    $productcategory = $_REQUEST['pro_cat'];
		    $productstatus = $_REQUEST['status'];
		    $productimage = $_REQUEST['fileupload'];
		    $date = date("Y-m-d H:i:s");
			
			if($productname == "" || $productcategory == "" || $productstatus == "" || $productimage == "")
		    {
			
		    }
		 
			$target_dir = "./Image/";
		    $file = $_FILES['fileupload']['name'];
		    $path = pathinfo($file);
		    $filename = $path['filename'];
		    $ext = $path['extension'];
		    $new_file_name=$filename.rand(0000,9999).time().'.'.$ext;
		    $temp_name = $_FILES['fileupload']['tmp_name'];
		    $path_filename_ext = $target_dir.$new_file_name;
			
		if (move_uploaded_file($temp_name,$path_filename_ext))
		{			
		$update = "update product set product_name = '$productname', product_category = '$productcategory', product_status = '$productstatus', product_image = '$new_file_name', updated_date = '$date' where id = $id";
		//print_r($update);
		}
		if($con->query($update) === true)
		{
		 header('location:showdata.php');
		}
	}
  }
?>
<html>
<head>
	<title>Editindex</title>
	</head>
	<body>
		<form action="" align = "center" method="POST" enctype="multipart/form-data">
			<h1>ADMIN EDIT PANEL</h1><br>
			Product Name : <input type="text" name="pro_name" value = "<?php echo $row['product_name'];?>"><p><br> 
			Product Category : <select name="pro_cat">
								  <option <?php if($row['product_category']==""){echo "selected";}?>>None</option>
								  <option <?php if($row['product_category']=="Mobile"){echo "selected";}?>>Mobile</option>
								  <option <?php if($row['product_category']=="Laptop"){echo "selected";}?>>Laptop</option>
								  <option <?php if($row['product_category']=="Home Theater"){echo "selected";}?>>Home Theater</option>
								  <option <?php if($row['product_category']=="Head Phone"){echo "selected";}?>>Head Phone</option>
							   </select><p><br>
		    Status : <input type="radio" name="status" value="Active" <?php if($row['product_status']=="Active"){ echo "checked";}?> checked> Active
 					 <input type="radio" name="status" value="Deactive" <?php if($row['product_status']=="Deactive"){ echo "checked";}?>> Deactive<p><br>
 					 	<table><td><img style="width: 50px;height: 40px;" class="center" src="./Image/<?php echo $row['product_image']; ?>"></td></table>
		    Click to Upload : <input type="file" name="fileupload"><p><br> 
 			<input type="submit" name="mod" value="Modify">
	</body>
</html>