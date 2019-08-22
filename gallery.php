@@ -1,97 +0,0 @@
<?php
function ekle($conn){
if (isset($_POST["button-ekle"])) {
  $newfilename=$_POST["filename"];


  if(empty($_POST["filename"])){
      $newfilename="gallery";
  }
  else{
    $newfilename=strtolower(str_replace(" ","-",$newfilename));
  }
  switch ($_POST['konu']) {
    case 'biomedical':
          $var="biomedical";
      break;
      case 'otomasyon':
            $var="otomasyon";
            break;
    case 'enerji':
        $var="enerji";
        break;
        case 'robotik':
          $var="robotik";
        break;
          case 'yapayzeka':
          $var="yapayzeka";
          break;
    default:
      break;
    }
  $imagetitle=$_POST["filetitle"];
  $imagedesc=$_POST["filedesc"];

  $file = $_FILES['file'];

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
            if (empty(($imagetitle) || ($imagedesc))) {
              header("location: ../gallery.php?upload=empty");
              exit();
            }
          else{
              $sql="SELECT * FROM resimler;";
              $stmt=mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "sql statement failedd!";
              }
              else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);
                $rowcount= mysqli_num_rows($result);
                $setimageorder= $rowcount +1;
                $sql="INSERT INTO resimler (gallerytitle,	descgallery,	ordergallery,imagefullname,konu) VALUES (?, ?, ?, ?,?);";

              }
              if (!mysqli_stmt_prepare($stmt,$sql)) {
                echo "sql statement failed!";
                exit();
              }
              else{
                mysqli_stmt_bind_param($stmt,"sssss",$imagetitle,$imagedesc,$setimageorder,$imagefullname,$var);
                mysqli_stmt_execute($stmt);

                move_uploaded_file($filetemp,$filedestination);
                header("location:index.php?upload=success");
              }
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
}