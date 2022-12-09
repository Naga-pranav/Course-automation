<!DOCTYPE html>
<html>
<head>
	<title>Excel Uploading PHP</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
      body{
            background-image: url("img/background.jpg");
      }
      h1{
            color: white;
            text-align: center;
      }
      h3{
            color:white;
            text-align:center;
            padding-top:20px;
      }
      .head{
            color:white;
            text-align: center;
      }
      th,td{
            width:20%;
      }
      .tablecenterheadCSS{
            text-align: center;
      }
      .tab{
            margin-left: 100px;
      }
      .aa{
            padding-bottom:20px;
            
      }
      td{
            width:"60px";
      }
      .naga{
            color: white;
      }
      th{
         color:white;
      }
</style>

<body>

<center>
<div class="jumbotron bg-transparent container aa">
	<h1>Excel Upload</h1>


	<form method="POST" action="faculty_info.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="naga">Upload Excel File</label>
			<input type="file" name="file" class="form-control">
		</div>
		<div class="form-group1">
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
                  $slno = $row['0'];
                  $EmpID = $row['1'];
                  $Name = $row['2'];
                  $Designation = $row['3'];
                  $phno = $row['4'];
                  $School = $row['5'];
                  $Email = $row['6'];
                  
                  $sqlquery  = "INSERT INTO faculty_info VALUES ('.$slno.','.$EmpID.','$Name','$Designation','$phno','$School','$Email')";
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
            
            //header('Location:act.html');
            //exit(0);
      }
}
?>
<div class="aa">
<h1>(OR)</h1>

<h3>Insert Courses</h3>
<div class="tab">
<table style="width:80%" class="tablecenterheadCSS table table-bordered ">
    
  <form method="post" >
   <tr>
      <th scope="col">Sl no</th>
      <td ><input type="text" name = "slno" /></td>
      </tr><tr>
      <th scope="col">Emp ID</th>
      <td><input type="text" name = "empid" /></td>
      </tr><tr>
      <th scope="col">Name</th>
      <td><input type="text" name = "name" /></td>
      </tr><tr>
      <th scope="col">Designation</th>
      <td><input type="text" name = "desig" /></td>
      </tr><tr>
      <th scope="col">Phone no</th>
      <td><input type="text" name = "phno" /></td>
      </tr><tr>
      <th scope="col">School</th>
      <td><input type="text" name = "school" /></td>
      </tr><tr>
      <th scope="col">Email ID</th>
      <td><input type="text" name = "email" /></td>
      </tr><tr>
      <th scope="col">Add courses</th>
      <td><input type="submit" name = "submit" value = "Add"/> </td>
    </tr>
  </form>
</div>

  <?php
  
  if(isset($_POST['submit']))
  {
      $ccode=$_REQUEST['slno'];
      $cid=$_REQUEST['empid'];
      $name=$_REQUEST['name'];
      $desig=$_REQUEST['desig'];
      $phno=$_REQUEST['phno'];
      $school=$_REQUEST['school'];
      $email=$_REQUEST['email'];
 
      $sqlquery  = "INSERT INTO faculty_info VALUES ('$ccode','$cid','.$name.','.$desig.','.$phno.','.$school.','.$email.')";
      $result = mysqli_query($conn, $sqlquery);
      $msg = true;
     
      if(isset($msg)){
            echo "Row inserted";
            header('Location:faculty_info.php');
      }
      // else {
      //       echo "Row not inserted";
      // }
  }
  
  ?>
</table>

</div>
</center>
</body>
</html>
