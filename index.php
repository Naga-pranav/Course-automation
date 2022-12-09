<?php session_start(); ?>
<?php include('db/db.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Page</title>
      
      <link rel="stylesheet" href="css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/4e1e0e24e3.js" crossorigin="anonymous"></script>
   </head>

   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Faculty Login
            </div>
            <div class="title signup">
               Admin Login
            </div>
         </div>
         <div class="slide-controls-error" id="error-slide">
           <label class="error" id="error-display"></label>
         </div>
         <div class="slide-controls-success" id="success-slide">
           <label class="success" id="success-display"></label>
         </div>

         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Faculty</label>
               <label for="signup" class="slide signup">Admin</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="#" class="login" method="post">
                  <div class="field">
                     <input type="text" name="EmpID" id="user_ID" placeholder="Employee ID" required>
                  </div>
                  <div class="field">
                     <input type="password" name="pass" id="user_password" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input id="loginpress" type="submit" name="login" value="Login">
                  </div>
               </form>
               <form action="#" class="signup" method="post">
                  <div class="field">
                     <input id="admin_id" type="text" name="EmpID" placeholder="Admin ID"  required>
                  </div>
                  <div class="field">
                     <input id="admin_password" type="password" name="pass" placeholder="Password"  required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input id="loginpress" type="submit" name="login" value="Login">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <?php
      
            if (isset($_POST['login']))
                {
                    $username = mysqli_real_escape_string($conn, $_POST['EmpID']);
                    $password = mysqli_real_escape_string($conn, $_POST['pass']);
                    
                    $query 		= mysqli_query($conn, "SELECT * FROM fac WHERE pass='$password' and EmpID='$username'");
                    $row		= mysqli_fetch_array($query);
                    $num_row 	= mysqli_num_rows($query);
                    
                    if ($num_row > 0) 
                        {
                            $typ = mysqli_query($conn,"SELECT user FROM fac WHERE pass='$password' and EmpID='$username'");
                            $ser = mysqli_fetch_array($typ);
                            $ser = $ser['user'];
                            if(strcmp($ser,'faculty')==0)
                            {
                                header('location:faculty.php');
                            }
                            else
                            {
                                header('location:admin.php');
                            }
                        }
                    else
                        {
                            echo '<script type="text/JavaScript"> 
                            alert("Invalid Employee ID or password");
                            </script>';
                        }
                }
        ?>
        
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");

         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
      </script>
   </body>
</html>