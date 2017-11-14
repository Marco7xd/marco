<!DOCTYPE html><html><head><meta charset="utf-8">
<?php
   function add($x, $y)
   {
      $s = $x + $y;
      return $s;
   }
   function sub($x, $y)
   {
      $s = $x - $y;
      return $s;
   }
   function mult($x, $y)
   {
      $s = $x * $y;
      return $s;
   }
   function divi($x, $y)
   {
      $s = $x / $y;
      return $s;
   }
?>
</head>
<body>
<?php
   if($_POST["w1"] == "" || $_POST["w2"] == "")
      echo "Zwei Werte notwendig";
   else
   {
      $w1 = doubleval($_POST["w1"]);
      $w2 = doubleval($_POST["w2"]);
      $oper = $_POST["oper"];

      if($oper == "/" && $w2 == 0)
         echo "Division durch 0 nicht erlaubt";
      else
      {
         if ($oper == "+")      $erg = add ($w1, $w2);
         else if ($oper == "-") $erg = sub ($w1, $w2);
         else if ($oper == "*") $erg = mult($w1, $w2);
         else                   $erg = divi($w1, $w2);
         echo "$w1 $oper $w2 = $erg";
      }
   }
?>
</body></html>
