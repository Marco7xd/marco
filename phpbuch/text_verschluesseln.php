<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   $con = mysqli_connect("", "root", "rooter");
   mysqli_select_db($con, "logindaten");
   $sql = "SELECT * FROM benutzer WHERE name='" . $_POST["na"]
      . "' AND pw='" . md5($_POST["pw"]) . "'";
   echo "$sql<br>";
   $res = mysqli_query($con, $sql);
   if(mysqli_num_rows($res) > 0) echo "Login erlaubt";
   else                          echo "Login nicht erlaubt";
   mysqli_close($con);
?>
</body></html>
