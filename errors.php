@@ -1,12 +0,0 @@
<?php include('db.php');
include('function.php');
?>
<?php
  setlogin($conn);
  if (count($errors) > 0): ?>
 <div class="errors">
  <?php foreach ($errors as $error): ?>
    <p><?php echo $error; ?></p>
  <?php endforeach ?>
 </div>
<?php endif ?>?