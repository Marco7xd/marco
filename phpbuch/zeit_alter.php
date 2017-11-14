<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Geburtstag */
   $geburt = mktime(0, 0, 0, 11, 7, 1979);
   echo "Geburt: " . date("d.m.Y",$geburt) . "<br>";

   /* Aktuell */
   $heute = time();
   echo "Heute: " . date("d.m.Y",$heute) . "<br>";

   /* Alter berchnen */
   $hy = intval(date("Y",$heute));
   $gy = intval(date("Y",$geburt));
   $alter = $hy - $gy;

   /* Noch keinen Geburtstag gehabt dieses Jahr ? */
   $hm = intval(date("m",$heute));
   $hd = intval(date("d",$heute));
   $gm = intval(date("m",$geburt));
   $gd = intval(date("d",$geburt));

   if ($hm<$gm || $hm==$gm && $hd<$gd)
      $alter = $alter - 1;

   echo "Alter: " . $alter;
?>
</body></html>
