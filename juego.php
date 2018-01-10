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


