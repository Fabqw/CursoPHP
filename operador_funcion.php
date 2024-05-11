<?php
    echo "menor ",1<=>5,"<br>";
    echo "igual ",10<=>10,"<br>";
    echo "mayor ",10<=>2,"<br>";
    echo "<br> Arreglo <br>";
    $arreglo = [3,1,2,5,4];
    echo sort($arreglo, SORT_ASC);

    function comparar($a, $b){
        return $a<=>$b;
    }
    echo "<br> usando la funcion <br>";
    usort($arreglo, 'comparar');
    echo implode('-', $arreglo);
?>
