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
   		 $res = mysqli_query($con, "select * from product where product_name LIKE '%$search%' or id = '$search'");
    	 //$res = $con->query($src);
    }
}
    else
    {
    	 $res =  mysqli_query($con, "select * from product");
         //$res = $con->query($src);
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
            <input type="submit" name="home" formaction="product_index.php" value="Add">
            <input type="submit" name="datarefresh" formaction="showdata.php" value="Refresh"><br><br>
            <table width="100%">
                <tr>
                	<th>Sl No</th>
                    <th>NAME</th>
                    <th>CATEGORY</th>
                    <th>STATUS</th>
                    <th>IMAGE</th>
                    <th>CREATED DATE</th>
                    <th>UPDATED DATE</th>
                    <th colspan="3">ACTION</th>
                </tr>
                <?php
               // $rows = array();
				if(mysqli_num_rows($res) > 0)
				{
               		 while($result = mysqli_fetch_array($res))
					//$result = mysqli_fetch_array($res)
               		 	
				    	{
				    		$rows[] = $result;
				    		$counter = 1;
				    	}
               		foreach ($rows as $row)
               		{
                	?>
                <tr>
                	<td><?php echo $counter++;?></td>
                    <td><?php echo $row['product_name'];?></td>
                    <td><?php echo $row['product_category'];?></td>
                    <td><?php echo $row['product_status'];?></td>
                    <td><img style="width: 50px;height: 40px;" src="./Image/<?php echo $row['product_image']; ?>"></td>
                    <td><?php echo $row['created_date'];?></td>
                    <td><?php echo $row['updated_date'];?></td>
                    <td>
                    	<input type="button" onclick = "window.location.href = 'edit.php?mod-id=<?php echo $row['id'];?>'" value = "Edit">
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