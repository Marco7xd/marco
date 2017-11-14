<?php
   namespace ErsterNamensraum
   {
      class TestklasseA{}
      echo "<br>" . TestklasseA::class . "<br>";

      class TestklasseB
      {
         function __construct() { echo "TestklasseB-Objekt<br>";}
      }

      const pi = 3.1415926;

      function fkt() { echo "Funktion fkt()<br>"; }
   }
   
   namespace ZweiterNamensraum
   {
      class TestklasseA{}
      echo "<br>" . TestklasseA::class . "<br>";

      use ErsterNamensraum\TestklasseB;
      $x = new TestklasseB();

      function pow($a, $b)
      {
          return $a + $b;
      }

      echo pow(2,3) . "<br>";
      echo \pow(2,3) . "<br>";
   }
   
   namespace
   {
      class TestklasseA{}
      echo "<br>" . TestklasseA::class . "<br>";

      use const ErsterNamensraum\pi;
      echo pi . "<br>";

      use function ErsterNamensraum\fkt;
      f();
   }
?>
