<html>
<head>
	<title>Admindex</title>
	</head>
	<body>
		<form action="append.php" align = "center" method="POST" enctype="multipart/form-data">
			<h1>ADMIN PANEL</h1><br>
			Product Name : <input type="text" name="pro_name"><p><br>
			Product Category : <select name="pro_cat">
								  <option value="">None</option>
								  <option value="Mobile">Mobile</option>
								  <option value="Laptop">Laptop</option>
								  <option value="Home_theater">Home Theater</option>
								  <option value="Head_phone">Head Phone</option>
							   </select><p><br>
		    Status : <input type="radio" name="status" value="Active" checked> Active
 					 <input type="radio" name="status" value="Deactive"> Deactive<p><br>
		    Click to Upload : <input type="file" name="fileupload"><p><br> 
 			<input type="submit" name="add" value="Append">
 			<input type="submit" name="showdata" formaction="showdata.php" value="Database">
	</body>
</html>
