<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// var_dump($_POST);
$incognita = htmlspecialchars($_POST['incognita']);
$letra = isset($_POST['letra']) ? htmlspecialchars($_POST['letra']) : '';
$letras = isset($_POST['letras']) ? $_POST['letras'] : array();
$letras[] = $letra;
?>
<h1>
<?php
    for($i=0; $i<strlen($incognita); $i++){
        $coincidencia = false;
        foreach ($letras as $letra) {
            if($incognita[$i] === $letra) {
                echo $letra . " ";
                $coincidencia = true;
            } 
        }
        if(!$coincidencia) {
                echo "_ ";
        }
    }
?>
</h1>

<form action="" method="post">
    <input type="hidden" name="incognita" value="<?php echo $incognita ?>" />
        <?php for($j=0; $j < count($letras) ; $j++) : ?>
    <input type="hidden" name="letras[<?php echo $j?>]" value="<?php echo $letras[$j] ?>" />
            <?php echo $letras[$j] ?>
        <?php endfor; ?>
    <br />
    <label for="letra">Escriba una letra</label>
    <input type="text" maxlength="1" size="1" name="letra" />
    <input type="submit" value="Enviar" />
</form>

