@@ -1,20 +0,0 @@
<?php
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