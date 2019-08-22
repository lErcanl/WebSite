@@ -1,185 +0,0 @@
<?php
session_start();
include 'db.php';
include 'function.php';
 ?>
<!DOCTYPE php>
<php>
  <head>
    <title>Argenews</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
crossorigin="anonymous"></script>

  </head>
  <body>
    <div class="login-konum">
      <a href="#" onclick="giriss()">giris</a>
      <a href="#" onclick="kayýtt()">kayýt</a>
    </div>
    <header>
<a href="index.php" class="header-brand"> Futurizm </a>

<ul>
    <li><a href="news.php">news <span class='fa fa-angle-down'></span></a>
    <ul>
      <li>
        <a href="sayfalar/biomedical.php">biomedical</a>
      </li>
      <li>
        <a href="sayfalar/otomasyon.php">otomasyon</a>
      </li>
      <li>
        <a href="sayfalar/enerji.php">Yeryüzü ve Enerji</a>
      </li>
      <li>
        <a href="sayfalar/robotik.php">robotik</a>
      </li>
      <li>
        <a href="sayfalar/yapayzeka.php">yapay zeka</a>
      </li>
      <li>
        <a href="sayfalar/gelecektopluluk.php">gelecek topluluk</a>
      </li>
    </ul>
  </li>
    <li><a href="video.php">videos</a></li>
    <li><a href="header/kurulus.php">hakkýmýzda</a></li>

          </ul>
          <?php
              if ($_SESSION['username']) {
              echo ' <div class="logout">
              <h2>welcome '.$_SESSION['username'].'</h2>
              <form  method="POST">
              <button type="submit" name="logout">logout</button>
              <input id="usernamee" type="hidden" name="username" value="'.$_SESSION['username'].'">
              </form>
            </div>';
          }
              ?>
              <?php
               if(isset($_POST['logout'])){
                session_start();
              session_destroy();
              session_unset();
  header("location:index.php?upload=success");
        exit();
              }
              ?>
      </header>
<div class="kapsar">

      <div class="helloo">
            <?php
              $sql2="SELECT * FROM resimler where ordergallery=5";
                  $stmt2=mysqli_stmt_init($conn);
                  if (!mysqli_stmt_prepare($stmt2,$sql2)) {
                    echo "sql statement failed";
                          }
                          else{
                            mysqli_stmt_execute($stmt2);
                            $result2=mysqli_stmt_get_result($stmt2);
                            while($row2=mysqli_fetch_assoc($result2)){
                              echo '<a href="sayfa.php?gecis='.$row2["ordergallery"].'">
                            <div style="background-image: url(resim/'.$row2["imagefullname"].');"><p>'.$row2["gallerytitle"].'</p>
                                </div>
                                  </a>';
                        }
                          }
        ?>
      </div>
        <div class="gallery-container">
                <?php
                $sql="SELECT * FROM resimler where ordergallery<5 ORDER BY ordergallery desc";
                $stmt=mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                  echo "sql statement failed";
                        }
                        else{
                          mysqli_stmt_execute($stmt);
                          $result=mysqli_stmt_get_result($stmt);
                          while($row=mysqli_fetch_assoc($result)){
                          echo  '
                          <a href="sayfa.php?gecis='.$row["ordergallery"].'" >

                          <div style="background-image: url(resim/'.$row["imagefullname"].');"><p>'.$row["gallerytitle"].'</p>
                            </div>
                              </a>';
                          }
                        }
                        ?>
                      </div>
                            </div>



  <div class="haber">
        <p>Güncel Haberler</p>
          <hr />
    </div>

    <div class="gerikalan">
<?php
$sql="SELECT * FROM resimler where ordergallery>5 ORDER BY CAST(ordergallery AS INTEGER) DESC";
$stmt=mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt,$sql)) {
echo "sql statement failed";
      }
      else{
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        while($row=mysqli_fetch_assoc($result)){
        echo  '
        <a href="sayfa.php?gecis='.$row["ordergallery"].'" >
        <div style="background-image: url(resim/'.$row["imagefullname"].');"><p>'.$row["gallerytitle"].'</p>
          <h2>'.$row["konu"].'</h2>
          </div>



  </a>
            <hr />';
        }
      }
      ?>



</div>
      <div class="kayýt">
        <div class="kapat" onclick="kapat()">
            <img src="resim/kapat.png" alt="">
            </div>
      <?php  echo  '<form class="menu" method="POST" action="'.setlogin($conn).'">
                <h1>kullanici adý:</h1>
              <input type="text" name="username">
                    <h1>kullanici sifre:</h1>
                  <input type="password" name="kullanacisifre">
                        <h1>kullanici sifre tekrar:</h1>
                  <input type="password" name="kullanacisifre2">
                  <button type="submit" name="button-kayit">kayit ol</button>
            </form>';
?>
      </div>

      <div class="giris">
        <div class="kapat" onclick="kapat()">
            <img src="resim/kapat.png" alt="">
        </div>
        <?php   echo  '<form  action="'.getlogin($conn).'" method="POST">
              <h1>kullanici adý:</h1>
              <input type="text" name="username">
                <h1>kullanici þifresi:</h1>
                  <input type="password" name="kullanacisifre">
                  <button type="submit" name="button-giris"></button>
            </form>';
 ?>
      </div>
          <script src="main.js">
          </script>
    </body>
</php>