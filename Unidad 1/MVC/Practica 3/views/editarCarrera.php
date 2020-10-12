<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=carreras");
        exit();
    }
?>
<h1>EDITAR CARRERA</h1>
<form method="POST">
    <?php
        $editarUsuario = new MvcController();
        $editarUsuario->editarCarreraController();
        $editarUsuario->actualizarCarreraController();
    ?>

</form>