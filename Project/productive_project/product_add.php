<html>
<head>
	<title>Admindex</title>
	</head>
	<body>
		<form id="productadd" action="append.php" align = "center" method="POST" enctype="multipart/form-data">
			<h1>Product Add</h1>
			Product Name : <input type="text" name="pro_name"></span><p><br>
			Product Category : <select name="pro_cat">
								  <option value="">None</option>
								  <option value="Mobile">Mobile</option>
								  <option value="Laptop">Laptop</option>
								  <option value="Home_theater">Home Theater</option>
								  <option value="Head_phone">Head Phone</option>
							   </select><p><br>
		    Status : <input type="radio" name="status" value="Active" checked> Active
 					 <input type="radio" name="status" value="Deactive"> Deactive<p><br>
		    Choose Product Image : <input type="file" name="fileupload"><p><br> 
 			<input type="submit" name="add" value="Add">
 			<input type="submit" name="showdata" formaction="index.php" value="Home">
 			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
			<script src="validation.js"></script>
	</body>
</html>