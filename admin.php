@@ -1,71 +0,0 @@
<?php
date_default_timezone_set('Europe/Istanbul');
include_once 'db.php';
  include 'gallery.php';
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

<?php
      echo '<form action="'.ekle($conn).'" method="POST"  enctype="multipart/form-data">
        <h1>konu:</h1>
      <select name="konu">
        <option value="biomedical">biomedical</option>
        <option value="otomasyon">otomasyon</option>
        <option value="enerji">enerji</option>
        <option value="robotik">robotik</option>
        <option value="yapay zeka">yapay zeka</option>
      </select>
        <h1>baslýk:</h1>
        <textarea name="filetitle"></textarea><br>
        <h1>içerik</h1>:
          <textarea name="filedesc"></textarea>
          <input type="text" name="filename" placeholder="Filename">
          <input type="file" name="file">

          <button type="submit" name="button-ekle">Resim Ekle</button>
            </form>';
?>
          <div class="gallery-admin">
            <?php
      $sql2="SELECT * from resimler;";
              $stmt2=mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt2,$sql2)) {
                    echo "sql statement failed";
                          }
                          else{
                            mysqli_stmt_execute($stmt2);
                            $result2=mysqli_stmt_get_result($stmt2);
                            while($row2=mysqli_fetch_assoc($result2)){
                              echo'  <form action="edit.php"  method="POST">
                                   <div style="background-image: url(resim/'.$row2["imagefullname"].');">
                                   <input type="hidden" name="picname" value="'.$row2["imagefullname"].'">
                                   <input type="hidden" name="picorder" value="'.$row2["ordergallery"].'">
                                   <input type="hidden" name="descgalleryy" value="'.$row2["descgallery"].'">
                                   <input type="hidden" name="gallerytitlee" value="'.$row2["gallerytitle"].'">
                                   <button type="submit" name="editt">edit</button>
                                  <h3>'.$row2["gallerytitle"].'</h3>
                                </div>
     </form>';
                        }
                         }

                            if (isset($_POST['edit-comment'])) {
                              echo '<textarea name="name" >'.$_POST["filedesc"].'</textarea>
                                      ';
                            }
                           ?>
      </div>
  </body>
</html>