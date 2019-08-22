@@ -1,6 +0,0 @@
<?php if(isset($_POST['logout'])){
  session_start();
session_destroy();
session_unset();
  exit();
} ?>