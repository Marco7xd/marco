<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php
class math
{
   const pi = 3.1415926;
   private $id;
   public static $nummer=0;

   function __construct()
   {
      self::$nummer = self::$nummer + 1;
      $this->id = self::$nummer;
   }

   static function quadrat($p)
   {
      return $p * $p;
   }

   function __toString()
   {
      return "Objekt $this->id, &pi; = " . self::pi
         . ", 3.2<sup>2</sup> = " . self::quadrat(3.2) . "<br>";
   }
}

$z = 2.5;
echo "$z<sup>2</sup> = " . math::quadrat($z) . "<br>";

$x = new math();
echo $x;
echo "Anzahl: " . math::$nummer . "<br>";

$y = new math();
echo $y;
echo "Anzahl: " . math::$nummer . "<br>";

echo math::pi . "<br>";
?>
</body></html>
