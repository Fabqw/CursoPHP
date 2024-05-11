<?php
    if (isset($_COOKIE['font-size']) and isset($_COOKIE['color'])) {
        $tam = $_COOKIE['font-size'];
        $color = $_COOKIE['color'];
    }else{
        $tam = '15px';
        $color = 'blue';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p{
            font-size: <?php echo $tam; ?>;
            color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Commodi, illum accusantium cumque corrupti accusamus dolorem, 
        nemo quod incidunt impedit aliquam sapiente quidem nulla quam 
        in expedita nihil porro quia non.
    </p>
</body>
</html>