<?php
include("connection.php");
if(isset($_POST['filter']))
{
    $search = $_POST['search'];
    if($search == "")
    {
    	echo "<script type='text/javascript'>alert('Plz input Name')</script>";
		//header('showdata.php');
    }
    else
    {
   		 $src = "select * from product where product_name LIKE '%$search%' or id LIKE '%$search%'";
    	 $res = $con->query($src);
    }
}
    else
    {
    	 $src = "select * from product";
         $res = $con->query($src);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Show Data</title>
        <style>
            table, th, tr, td 
                {
                    border: 1px solid black;
                    border-collapse: collapse;
                }
                    th, td 
                    {
                        padding: 10px;
                    }
        </style>
    </head>
    <body>
        <form action="" method="POST" align = "center">
            <h1>Product Details</h1>
            Product Name : <input type="text" name="search"><br><br>
            <input type="submit" name="filter" value="Filter">
            <input type="submit" name="home" formaction="product_index.php" value="Home"><br><br>
            <table width="100%">
                <tr>
                	<th>ID</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>STATUS</th>
                    <th>IMAGE</th>
                    <th>CREATED DATE</th>
                    <th>UPDATED DATE</th>
                    <th colspan="2">ACTION</th>
                </tr>
                <?php
				if(mysqli_num_rows($res) > 0)
				{
               		$result[] = mysqli_fetch_array($res);
               		//while($row = mysqli_fetch_array($res)) 
               		print_r($result);
               		foreach ($result as $row)
               		{
                	?>
                <tr>
                	<td><?php echo $row['id'];?></td>
                    <td><?php echo $row['product_name'];?></td>
                    <td><?php echo $row['product_category'];?></td>
                    <td><?php echo $row['product_status'];?></td>
                    <td><img style="width: 50px;height: 40px;" src="./Image/<?php echo $row['product_image']; ?>"></td>
                    <td><?php echo $row['created_date'];?></td>
                    <td><?php echo $row['updated_date'];?></td>
                    <td>
                    	<input type="button" onclick = "window.location.href = 'edit.php?mod-id=<?php echo $row['id'];?>'" value = "Modify">
                    </td>
                    <td>
                    	<input type = "button" onclick = "window.location.href = 'delete.php?del-id=<?php echo $row['id'];?>'" value = "Delete">
                    </td>
                </tr>
                <?php }}
                      /*else
		           {
			            // echo "<script>alert('$_POST[search], is NOT FOUND');location = 'showdata.php';</script>";
			             exit();  						 
				   }*/?>
            </table>
        </form>
    </body>
</html>