<?php
if(isset($_POST['submit']))
{
// Where the file is going to be stored
 $target_dir = "C:/xampp\htdocs\productive_project\Image/";
 $file = $_FILES['fileupload']['name'];
 $path = pathinfo($file);
 $filename = $path['filename'];
 $ext = $path['extension'];
 $new_file_name=rand(0000,9999).time().'.'.$ext;
 $temp_name = $_FILES['fileupload']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.$new_file_name;
 
// Check if file already exists
/*if (file_exists($path_filename_ext))
{
 echo "Sorry, file already exists.";
}*/
 
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "Congratulations! File Uploaded Successfully.";
}
?>