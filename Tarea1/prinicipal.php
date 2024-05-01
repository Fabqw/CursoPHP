<?php    
    $cadena = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['calculo'])){
        $cadena = $_POST['calculo'];
        if(isset($_POST['boton']) && $_POST['boton'] == "="){
            $cadena = eval('return '.$_POST['calculo'].';');
        } else {
            if(isset($_POST['boton'])){
            $cadena .= $_POST['boton'];
            }
        }
        if(isset($_POST['boton']) && $_POST['boton'] == "C"){
            $cadena = '';
        }
        }    
    }    
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
    <h2>Calculadora</h2>
    <form method="post">
        <div class="input">
            <input type="text" name="calculo" value="<?php echo $cadena ?>"/>
        </div>
        <div class="principal">            
            <div class="conteiner">            
                <div class="numeros">
                    <div>
                        <input type="submit" name="boton" value="7"/>
                        <input type="submit" name="boton" value="8"/>
                        <input type="submit" name="boton" value="9"/>
                    </div><br>
                    <div>
                        <input type="submit" name="boton" value="4"/>
                        <input type="submit" name="boton" value="5"/>
                        <input type="submit" name="boton" value="6"/>
                    </div><br>
                    <div>
                        <input type="submit" name="boton" value="1"/>
                        <input type="submit" name="boton" value="2"/>
                        <input type="submit" name="boton" value="3"/>
                    </div><br>
                    <div>
                        <input type="submit" name="boton" value="0"/>
                        <input type="submit" name="boton" value="("/>
                        <input type="submit" name="boton" value=")"/>
                    </div>       
                </div>
                <div class="operadores">
                    <input type="submit" name="boton" value="/"/>
                    <input type="submit" name="boton" value="-"/>
                    <input type="submit" name="boton" value="+"/>
                    <input type="submit" name="boton" value="*"/>                               
                </div>
                <div class="res">                    
                    <input type="submit" name="boton" value="="/>
                    <input type="submit" name="boton" value="C"/>
                </div>
            </div>
        </div>        
    </form>
</body>
</html>
<?php
include('cliente.php');
?>  