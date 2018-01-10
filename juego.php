<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$incognita = htmlspecialchars($_POST['incognita']);
?>
<h1>
<?php
    for($i=0; $i<strlen($incognita); $i++) echo "_ ";
?>
</h1>

<form action="" method="post">
    <input type="hidden" name="incognita" value="<?php echo $incognita ?>"
    <label for="letra">Escriba una letra</label>
    <input type="text" maxlength="1" size="1" name="letra" />
    <input type="submit" value="Enviar" />
</form>

