<!DOCTYPE html>
<html>
    <head>
        <title>Decliend ATM Stats</title>
        <link rel="stylesheet" href="style.css">
        <link href="font linke" rel="stylesheet">
    </head>
    <body>
        <div class="hero">
            <div class="navbar">
                <img src="img/logo1.png">
            </div>
        </div>
        
        <div class="banner">
            <div class="left-column"><img src="img/atm.png"></div>
            <div class="right-column">
                <form method="post">
                
                <div class="field">
                    
                
                    <?php
                    
                    
                    $con = new mysqli('localhost', 'root', '', 'brhan');
                    if(!$con) echo "not connected";
                    session_start();
                      if(isset($_POST['username']))  $username = $_POST['username'];
                      if(isset($_POST['password']))  $password = $_POST['password'];
                  $error_Message = false;
                      if(isset($_POST['login']))  {
                          $sqlSelect = "SELECT * FROM users where  username='$username' and password='$password'";
                          $result = $con->query($sqlSelect);
                          
                          
                          if (isset($result) && mysqli_num_rows($result)>0) {
                              echo "logged in successifully";
                              $error_Message = false;
                              foreach ($result as $row)
                              {
                                $_SESSION['name'] = $row['username'];
                              }
                          
                              
                          } else $error_Message = true;
                      }  
                      if($error_Message) {
                          echo " <div class=\"error-txt\"> Invalid Password or Username</div>";
                      }     
                      if(isset($_SESSION['name'])){
                        header("location:index.php");
                      }            
                    ?>
                    
                    <input type="text" placeholder="Enter your username" class="un" name="username">
                    <input type="password" placeholder="Enter your password" class="ps" name="password">
                </div>
                <div class="btn">
                    <input type="submit" value="Login" class="sub" id="primary-btn" name="login">


                </div>
                </form>

                <?php
  


   ?>
                       
            </div>
        </div>
        <div class="footer">
                <p> © 2021 BIRHAN BANK | Softify </p>
                <p>Version 1.0</p>
          
        </div>
    </body>
</html>