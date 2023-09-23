<?php
$contra_entrar="1234";
$usu_entrar="Juan";

$el_usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : $_POST["usuario"];
$la_contra = isset($_POST["contraseña"]) ? $_POST["contraseña"] : $_POST["contraseña"];

if($el_usuario==$usu_entrar && $la_contra==$contra_entrar){
    echo "autorizado";
}else{
    echo "fallo";
}
?>