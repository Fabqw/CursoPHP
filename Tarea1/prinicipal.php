<?php
    include('cliente.php');
    //Operaciones de la calculadora
    function suma(){
        $suma = 1+2;
        echo $suma;
    }
    suma();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Calculadora PHP</h2>
    <form action="">
        <input type="text">
        <div class="panel">
            <div class="numeros">
                <input type="button" value="9">
                <input type="button" value="8">
                <input type="button" value="7"><br>
                <input type="button" value="6">
                <input type="button" value="5">
                <input type="button" value="4"><br>
                <input type="button" value="3">
                <input type="button" value="2">
                <input type="button" value="1"><br>
                <input type="button" value="0">
                <input type="button" value="=">
            </div>
            <div class="operadores">
                <input type="button" value="+"><br>
                <input type="button" value="-"><br>
                <input type="button" value="*"><br>
                <input type="button" value="/"><br>                
            </div>
        </div>
    </form>
</body>
</html>