<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="stylesheet" href="css/app.css">
  <link rel="stylesheet" href="style.css">
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

  <title>Document</title>

</head>
<body>
  <?php
  class Base
{
    public $name = 'Vasya';

    public function first()
    {
        return 'first';
    }
}

class Sub extends Base
{
    public $date = '2000-01-12';
}

$base = new Base();

echo $base->first() . PHP_EOL;

$sub = new Sub();

echo $sub->first() . PHP_EOL;

?>
</body>
</html>
