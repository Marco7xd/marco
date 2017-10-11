<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
   srand((double)microtime()*1000000);
   function wuerfelwertGenerator()
   {
      for($i=1; $i<=10; $i++)
         yield rand(1,6);
   }

   foreach(wuerfelwertGenerator() as $wert)
      echo "$wert ";
?>
</body></html>
