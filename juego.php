<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// var_dump($_POST);
$incognita = htmlspecialchars($_POST['incognita']);
$vidas = isset($_POST['vidas']) ? (int)($_POST['vidas']) : 7;
$letra = isset($_POST['letra']) ? htmlspecialchars($_POST['letra']) : '';
$letras = isset($_POST['letras']) ? $_POST['letras'] : array();
if(preg_match("%[a-z]%", $letra) && !in_array($letra, $letras))
    $letras[] = $letra;
?>
<h1>
<?php
    $aciertos = 0;
    $enEstaOcasionHaAcertado = false;
    for($i=0; $i<strlen($incognita); $i++){
        $coincidencia = false;
        foreach ($letras as $letra) {
            if($incognita[$i] === $letra) {
                echo $letra . " ";
                $coincidencia = true;
                $aciertos++;
                if($letra == $letras[count($letras)-1])
                    $enEstaOcasionHaAcertado = true;
            } 
        }
        if(!$coincidencia) {
                echo "_ ";
        }
    }
    if(!$enEstaOcasionHaAcertado) {
        $vidas--;
    }
?>
</h1>

<?php if($aciertos === strlen($incognita)) : ?>
<h2>
    Ganaste!!!!
    <a href="index.html">Otra palabra</a>
</h2>
<?php elseif($vidas === 0) : ?>
<h2>
    Perdiste!!!!
    <a href="index.html">Otra palabra</a>
</h2>
<?php else : ?>
<form action="" method="post">
    <input type="hidden" name="incognita" value="<?php echo $incognita ?>" />
    <input type="hidden" name="vidas" value="<?php echo $vidas ?>" />
        <?php for($j=0; $j < count($letras) ; $j++) : ?>
    <input type="hidden" name="letras[<?php echo $j?>]" value="<?php echo $letras[$j] ?>" />
            <?php echo $letras[$j] ?>
        <?php endfor; ?>
    <br />
    <label for="letra">Escriba una letra</label>
    <select name="letra">
        <?php for($i = ord('a'); $i <= ord('z'); $i++) : ?>
            <option value="<?php echo chr($i) ?>"><?php echo chr($i) ?></option>
        <?php endfor; ?>
    </select>
    <input type="submit" value="Enviar" />
</form>
<?php endif; ?>
