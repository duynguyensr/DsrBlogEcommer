<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./public/icon/icon-shop.png?v=<?php echo time(); ?>" type="image/ico">
    <title>DSRBlog</title>
    <style>
        * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: OpenSans, sans-serif;
}
    </style>
</head>
<body>
    <h1>
        <?php 
            spl_autoload_register(function($class){
                include_once("./system/library/".$class.".php");
            });
            // include_once("./system/library/Main.php");
            // include_once("./system/library/DController.php");
            // include_once("./system/library/Database.php");
            // include_once("./system/library/DModel.php");
            // include_once("./system/library/Load.php");
            include_once("./app/config/config.php");
            $main = new Main();    
        ?>
    </h1>
</body>
</html>