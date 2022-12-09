<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<style>
    .table-hover tr:hover{
        background-color:white;
    }
    body{
            background-image: url("img/background.jpg");
            color: white;
      }
table, th, td {
  border:1px solid black;
  color: white;
}
</style>
</head>
<body>
<div class="container mt-3">
<h2>Course Details</h2>

<table class="table table-hover" style="width:100%">
  <tr>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Lecture hours</th>
    <th>Tutorial hours</th>
    <th>Practical hours</th>
    <th>J project hours</th>
    <th>Credits</th>

  </tr>
  <?php
  include("db/db.php");
  $result = mysqli_query($conn,"SELECT * FROM `courses` WHERE 1");
  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
      echo "<tr>
      <td>".$row['0']."</td>
      <td>".$row['1']."</td>
      <td>".$row['2']."</td>
      <td>".$row['3']."</td>
      <td>".$row['4']."</td>
      <td>".$row['5']."</td>
      <td>".$row['6']."</td>

      </tr>
      
      " ;
  }

  ?>
  </table>
  <h3>Insert Courses</h3>
  <div class="spd">
  <table class="">
  <tr>
    <th>Course Code</th>
    <th>Course Name</th>
    <th>Lecture hours</th>
    <th>Tutorial hours</th>
    <th>Practical hours</th>
    <th>J project hours</th>
    <th>Credits</th>
    <th>Add courses</th>


  </tr>
  <form method="post" >
      <tr>
            <td><input type="text" name = "code" /></td>
            <td><input type="text" name = "name" /></td>
            <td><input type="text" name = "lhrs" /></td>
            <td><input type="text" name = "thrs" /></td>
            <td><input type="text" name = "phrs" /></td>
            <td><input type="text" name = "jhrs" /></td>
            <td><input type="text" name = "credits" /></td>
            <td><input type="submit" name = "submit" value = "Add"/> </td>


      </tr>
  </form>
  <?php
  
  if(isset($_POST['submit']))
  {
      $ccode=$_REQUEST['code'];
      $cname=$_REQUEST['name'];
      $lecthrs=$_REQUEST['lhrs'];
      $tuthrs=$_REQUEST['thrs'];
      $practhrs=$_REQUEST['phrs'];
      $jhrs=$_REQUEST['jhrs'];
      $credits=$_REQUEST['credits'];
 
      $sqlquery  = "INSERT INTO courses VALUES ('$ccode','$cname','.$lecthrs.','.$tuthrs.','.$practhrs.','.$jhrs.','.$credits.')";
      $result = mysqli_query($conn, $sqlquery);
      $msg = true;
     
      if(isset($msg)){
            echo "Row inserted";
            header('Location:view_add.php');
      }
      // else {
      //       echo "Row not inserted";
      // }
  }
  
  ?>
</table>
  </div>
  

  
</div>

</body>
</html>
