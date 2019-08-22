@@ -1,120 +0,0 @@
<?php
include 'db.php';
include 'function.php';

 ?>

  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    </head>
    <body>
<div class="gallery-admin">

            <?php

              if (isset($_POST['editt'])) {
                      echo '<form method="POST"  enctype="multipart/form-data">
                      <div style="background-image: url(resim/'.$_POST["picname"].');">
                            </div>
                          <input type="text" name="filenamee" placeholder="Filename">
                          <input type="file" name="filee">
                                <input type="hidden" name="picorderr" value="'.$_POST["picorder"].'">
                                <h2>açýklama:</h2>

                                <textarea name="desc">'.$_POST['descgalleryy'].'</textarea>
                                <h2>baþlýk:</h2>

                                  <textarea name="title">'.$_POST['gallerytitlee'].'</textarea>
                                  <button type="submit" name="edit-title">edit</button>
                                  </form>';
              }

              if (isset($_POST['edit-title'])) {
                  $newfilename=$_POST["filenamee"];
                  if(empty($newfilename)){
                    $imagetitle=$_POST['title'];
                    $imagegallery=$_POST['picorderr'];
                    $imagedesc=$_POST['desc'];

                    $conn=mysqli_connect('localhost','root','','resim');
                    $sql="UPDATE resimler SET descgallery=?, gallerytitle=? WHERE ordergallery=?;";
            $stmt=mysqli_stmt_init($conn);
                          if (!mysqli_stmt_prepare($stmt,$sql)) {
                            echo "hata oldu";
                            exit();
                          }
                          else{
                mysqli_stmt_bind_param($stmt,'sss',$imagedesc,$imagetitle,$imagegallery);
                  mysqli_stmt_execute($stmt);
                          }
                  }
                  else{
                    $newfilename=strtolower(str_replace(" ","-",$newfilename));

                  $imagetitle=$_POST['title'];
                  $imagedesc=$_POST['desc'];
                 $imagegallery=$_POST["picorderr"];
                  $file = $_FILES['filee'];
                    $filename=$file["name"];
                    $filetype=$file["type"];
                    $filetemp=$file["tmp_name"];
                    $filerror=$file["error"];
                    $filesize=$file["size"];
                    $filext=explode(".",$filename);
                    $fileactualext = strtolower(end($filext));
                    $allowed = array("jpeg","jpg","png");
                    if (in_array($fileactualext,$allowed)) {
                      if ($filerror==0) {
                        if ($filesize<2000000) {
                          $imagefullname=$newfilename.".".uniqid("",true) .".". $fileactualext;
                          $filedestination="../futurist/resim/" .  $imagefullname;
                            include_once 'db.php';

                        $sql="UPDATE resimler SET descgallery=?, gallerytitle = ? , imagefullname = ? WHERE ordergallery = ?";
                $stmt=mysqli_stmt_init($conn);
                              if (!mysqli_stmt_prepare($stmt,$sql)) {
                                echo "sql statement failed!";
                                exit();
                              }
                              else{
                    mysqli_stmt_bind_param($stmt,'ssss',$imagedesc,$imagetitle,$imagefullname,$imagegallery);
                      mysqli_stmt_execute($stmt);
                                move_uploaded_file($filetemp,$filedestination);
                              }
                          }

                        else{
                          echo "file size is too big!";
                          exit();
                        }
                      }
                      else{
                        echo "you had an error!";
                        exit();
                      }
                      }
                    else{
                      echo "you need to upload proper file";
                      exit();
                    }
                  }
                    header("location:admin.php");
}




             ?>
           </div>

    </body>
  </html>