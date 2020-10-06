<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }
?>

<form method="POST">
    <?php
        $editarLibro = new MvcController();
        $editarLibro->editarLibroController();
        $editarLibro->actualizarLibroController();
    ?>

</form>