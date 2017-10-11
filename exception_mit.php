<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   /* Variable unbekannt */
   try
   {
      if(!isset($x))
         throw new Exception("Variable unbekannt");
      echo "Variable: $x<br>";
   }
   catch(Exception $e)
   {
      echo $e->getMessage() . "<br>";
   }
   finally
   {
      echo "Ende, Variable unbekannt<br>";
   }

   /* Division durch 0 */
   $x = 42;
   $y = 0;
   try
   {
      if($y == 0)
         throw new Exception("Division durch 0");
      $z = $x / $y;
      echo "Division: $x / $y = $z<br>";
   }
   catch(Exception $e)
   {
      echo $e->getMessage() . "<br>";
   }

   /* Zugriff auf Funktion */
   try
   {
      if(!function_exists("testFunktion"))
         throw new Exception("Funktion unbekannt");
      testFunktion();
   }
   catch(Exception $e)
   {
      echo $e->getMessage() . "<br>";
   }

   echo "Ende des Programms";
?>
</body></html>
