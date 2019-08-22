@@ -1,108 +0,0 @@
<?php
include 'db.php';
include 'function.php';
 ?>
<!DOCTYPE html>
<html>
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
<a href="index.html" class="header-brand"> Futurizm </a>

<ul>
    <li><a href="news.html">news <span class='fa fa-angle-down'></span></a>
    <ul>
      <li>
        <a href="ulasim.html">gelismis ulasim</a>
      </li>
      <li>
        <a href="ulasim.html">Yapay Zeka</a>
      </li>
      <li>
        <a href="ulasim.html">Yeryüzü ve Enerji</a>
      </li>
      <li>
        <a href="ulasim.html">Geliþmiþ insanlar</a>
      </li>
      <li>
        <a href="ulasim.html">gelismis ulasim</a>
      </li>
      <li>
        <a href="ulasim.html">gelismis ulasim</a>
      </li>
    </ul>
  </li>
    <li><a href="video.html">videos</a></li>
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
</html>