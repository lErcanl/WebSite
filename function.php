@@ -1,80 +0,0 @@
<?php
ob_start();



function setlogin($conn){
if(isset($_POST['button-kayit'])){
  $errors=array();
    $username = $_POST['username'];
  $pwd = $_POST['kullanacisifre'];
  $pwd2 =$_POST['kullanacisifre2'];
  if (empty($username)) { array_push($errors, "Username is required");
   }
    if (empty($pwd)) { array_push($errors, "Password is required");
     }
    if ($pwd != $pwd2) {
  	array_push($errors, "The two passwords do not match");
    }
    if(count($errors) == 0){
          $sql="INSERT INTO users (username,password) VALUES (?, ?);";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                  echo "sql statement failedd!";
                  exit();
                }
                else{
                  mysqli_stmt_bind_param($stmt,"si",$username,$pwd);
                  mysqli_stmt_execute($stmt);
                  $_SESSION['username']=$username;
                  header("location:index.php?upload=success");
                }
                  }
    else{
      echo "<div class='erco'>";
   foreach ($errors as $error){
        echo "<p>$error</p>";
          }
echo "</div>";
    }
  }
}
      function getlogin($conn){
          if (isset($_POST['button-giris'])) {
            $errors=array();
            $username=  $_POST['username'];
            $passwords= $_POST['kullanacisifre'];
if(empty($username)){
array_push($errors,"username is required");
}
if(empty($passwords)){
array_push($errors,"Password is required");
}
if (count($errors) == 0) {
$query = "SELECT * FROM users WHERE username=? AND password=?;";
$stmt=mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$query)) {
                echo "sql statement failed!";
                exit();
              }
              else{
    mysqli_stmt_bind_param($stmt,'si',$username,$passwords);
      mysqli_stmt_execute($stmt);
      $result=mysqli_stmt_get_result($stmt);
                            if ($row= mysqli_fetch_assoc($result)) {
                              session_start();
  $_SESSION['username']=$row['username'];
  if ($_SESSION['username']=="admin") {
    header("location:admin.php?success");
    exit();
  }
  else{
    header("location:index.php?sucess");

  }
}
          }
        }
      }
  }
?>