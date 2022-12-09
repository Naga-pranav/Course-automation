<!DOCTYPE html>
<html>
<head>
	<title>Excel Uploading PHP</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
      body{
            background-image: url("img/background.jpg");
      }
      h1{
            color: white;
            text-align: center;
      }
      .head{
            color:white;
            text-align: center;
      }
      .jumbotron{
            margin-top:200px;
      }
</style>
</head>
<body>


<div class="jumbotron bg-transparent container">
	<h1>Excel Upload</h1>
	<form method="POST" action="upload_course.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="head">Upload Excel File</label>
			<input type="file" name="file" class="form-control">
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-success">Upload</button>
		</div>
	</form>
</div>
<?php
include("db/db.php");
require 'vendor/autoload.php';
if (isset($_POST['submit']))
{
      $fileName=$_FILES['file']['name'];
      $file_ext = pathinfo($fileName,PATHINFO_EXTENSION);

      $allowed_ext = ['xls','csv','xlsx'];

      if(in_array($file_ext,$allowed_ext))
      {
            $inputFileName = $_FILES['file']['tmp_name'];
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
            $data = $spreadsheet->getActiveSheet()->toArray();
            $i=0;
            foreach($data as $row)
            {
                  if($i>0)
                  {
                  $ccode = $row['0'];
                  $cname = $row['1'];
                  $no_of_wishlist = $row['2'];
                  $no_of_students=70;
                  if($no_of_wishlist>10)
                  {
                  $batch = ceil($row['2']/$no_of_students);
                  }
                  else {
                    $batch = 0;
                  }
                  // echo $ccode . " " .$cname." " .$lecthrs. " " . $tuthrs. " " .$practhrs. " " .$jhrs. " " .$credits;
                  // echo "\n";
                  $sqlquery  = "INSERT INTO wishlist VALUES ('$ccode','$cname','$no_of_wishlist','$batch')";
                  $result = mysqli_query($conn, $sqlquery);
                  $msg = true;
            }
                  $i=$i+1;

                  }

            if(isset($msg)){
                  echo "Row inserted";
            }
            else {
                  echo "Row not inserted";
            }
      }
      else {

            echo "no rows in excel";
            exit(0);
      }
}
?>

</body>
</html>