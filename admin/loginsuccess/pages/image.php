<?php
include('../dbcon.php');

if($conn->connect_error)
	{
		die("connection failed".$conn->connect_error);
	}
  if(isset($_POST['back']))
  {
    header("location:addVehi3.php");  
  }
   
if(isset($_POST['save']))
{
   
    if(isset($_COOKIE['num_plate']))
    {
        $num_plate=$_COOKIE['num_plate'];
    }
    //First Image
    $count=0;
    $upload_image = $upload_image1 = $upload_image2 = $upload_image3 = $upload_image4 =$upload_image6= $add = "";

    $image=$_FILES['file'];
  $imagefilename=$image['name'];
  $imagefileerr=$image['error'];
  $imagefiletemp=$image['tmp_name'];
   print_r($imagefiletemp);
  $filename_separate=explode('.',$imagefilename);
  $file_extension=strtolower($filename_separate[1]);

  $extension=array('jpeg','jpg','png','jfif','webp');
  if(in_array($file_extension,$extension))
  {
    $upload_image='images/'.$imagefilename;
    move_uploaded_file($imagefiletemp,$upload_image);
    $count=$count+1;
}

  //Second Image
  $image1=$_FILES['file1'];
  $imagefilename1=$image1['name'];
  $imagefileerr1=$image1['error'];
  $imagefiletemp1=$image1['tmp_name'];
   print_r($imagefiletemp1);
  $filename_separate1=explode('.',$imagefilename1);
  $file_extension1=strtolower($filename_separate1[1]);

  if(in_array($file_extension1,$extension))
  {
    $upload_image1='images/'.$imagefilename1;
    move_uploaded_file($imagefiletemp1,$upload_image1);
    $count=$count+1;

  }
//Third Image
  $image2=$_FILES['file2'];
  $imagefilename2=$image2['name'];
  $imagefileerr2=$image2['error'];
  $imagefiletemp2=$image2['tmp_name'];
   print_r($imagefiletemp2);
  $filename_separate2=explode('.',$imagefilename2);
  $file_extension2=strtolower($filename_separate2[1]);

  if(in_array($file_extension2,$extension))
  {
    $upload_image2='images/'.$imagefilename2;
    move_uploaded_file($imagefiletemp2,$upload_image2);
    $count=$count+1;

  }


  //Bootspace Image
  $image3=$_FILES['file3'];
  $imagefilename3=$image3['name'];
  $imagefileerr3=$image3['error'];
  $imagefiletemp3=$image3['tmp_name'];
   print_r($imagefiletemp3);
  $filename_separate3=explode('.',$imagefilename3);
  $file_extension3=strtolower($filename_separate3[1]);

  if(in_array($file_extension3,$extension))
  {
    $upload_image3='images/'.$imagefilename3;
    move_uploaded_file($imagefiletemp3,$upload_image3);
    $count=$count+1;

  }

  //Inside Boot Image
  $image4=$_FILES['file4'];
  $imagefilename4=$image4['name'];
  $imagefileerr4=$image4['error'];
  $imagefiletemp4=$image4['tmp_name'];
   print_r($imagefiletemp4);
  $filename_separate4=explode('.',$imagefilename4);
  $file_extension4=strtolower($filename_separate4[1]);

  if(in_array($file_extension4,$extension))
  {
    $upload_image4='images/'.$imagefilename4;
    move_uploaded_file($imagefiletemp4,$upload_image4);
    $count=$count+1;

  }

  //Inside Image
 
  //Additional Image
  $image6=$_FILES['file6'];
  $imagefilename6=$image6['name'];
  $imagefileerr6=$image6['error'];
  $imagefiletemp6=$image6['tmp_name'];
   print_r($imagefiletemp6);
  $filename_separate6=explode('.',$imagefilename6);
  $file_extension6=strtolower($filename_separate6[1]);

  if(in_array($file_extension6,$extension))
  {
    $upload_image6='images/'.$imagefilename6;
    move_uploaded_file($imagefiletemp6,$upload_image6);
    $count=$count+1;

  }
  $add=$upload_image6;

 

  
 //if($count>=5)
  //{
   $sql = "INSERT INTO images (num_plate_id, full_image, front_image, rear_image, boot_image, inside_image, addi_image) VALUES ('$num_plate', '$upload_image', '$upload_image1', '$upload_image2', '$upload_image3', '$upload_image4', '$add')";
   $conn->query($sql);
    if($sql)
    {
      header("location:car.php");
    }
    
 // }

 
}
?>
<!doctype html>
<html lang="en">
  <head>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        *{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
img{
		max-height: 200px;
		max-width: 200px;
	}

/*form{
    box-shadow: 2px 6px 100px #ffffff;
}*/
    </style>
    <title>Form Design</title>
  </head>
  <body>
  <?php
include('sidenav.php'); 
?>
   <div class="container-fluid text-light py-3">
 
   </div>
   <section class="container my-2 bg-gray-100 w-95 text-light p-2" style="border-radius:20px;">
 
    <form class="row g-3 p-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
    <div class="col-md-4">
        <img src="#" id="newImg">
            
            <input type="file" class="form-control text-dark bg-light"  id="InpImg" name="file"/>
            <label class="form-label text-dark" for="InpImg"><b>Choose Full Image</b></label>
</div>
<div class="col-md-4">
        <img src="#" id="newImg1">
            
            <input type="file" class="form-control text-dark bg-light"  id="InpImg1" name="file1"/>
            <label class="form-label text-dark" for="InpImg1"><b>Choose Front View</b></label>
</div>
<div class="col-md-4">
       <img src="#" id="newImg2">
            
            <input type="file" class="form-control text-dark bg-light" id="InpImg2" name="file2"/>
            <label class="form-label text-dark" for="InpImg2"><b>Choose Rear View</b></label>
</div>
<div class="col-md-4">

<img src="#" id="newImg3">
<input type="file" class="form-control text-dark bg-light" id="InpImg3" name="file3">
            <label class="form-label text-dark" for="InpImg3"><b>Bootspace Image</b></label>
      
</div>
<div class="col-md-4">

<img src="#" id="newImg4">
<input type="file" class="form-control text-dark bg-light" id="InpImg4" name="file4">
            <label class="form-label text-dark" for="InpImg4"><b>Inside  Image</b></label>
      
</div>
<div class="col-md-4">

<img src="#" id="newImg6">
<input type="file" class="form-control text-dark bg-light" id="InpImg6" name="file6">
            <label class="form-label text-dark" for="InpImg6"><b>Additional Image</b></label>
      
</div>

<div class="col-md-12">
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Back" name="back"/>
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="Save" name="save"/>
        </div>
   
</form>
</section>
<script>
    InpImg.onchange=evt=>
    {
        const[file]=InpImg.files;
        if(file)
        {
            newImg.src=URL.createObjectURL(file);
        }
    }
    InpImg1.onchange=evt=>
    {
        const[file]=InpImg1.files;
        if(file)
        {
            newImg1.src=URL.createObjectURL(file);
        }
    }
    InpImg2.onchange=evt=>
    {
        const[file]=InpImg2.files;
        if(file)
        {
            newImg2.src=URL.createObjectURL(file);
        }
    }
    InpImg3.onchange=evt=>
    {
        const[file]=InpImg3.files;
        if(file)
        {
            newImg3.src=URL.createObjectURL(file);
        }
    }
    //Multiple Images
    InpImg4.onchange=evt=>
    {
        const[file]=InpImg4.files;
        if(file)
        {
            newImg4.src=URL.createObjectURL(file);
        }
    }

   
    InpImg6.onchange=evt=>
    {
        const[file]=InpImg6.files;
        if(file)
        {
            newImg6.src=URL.createObjectURL(file);
        }
    }
    
   
    </script>
</body>
</html>