<?php
    $a = 1;
    function num()
    {
        global $a;
        echo $a;
    }
    num();
?>
