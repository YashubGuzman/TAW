<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }
?>

<h1> LIBROS </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ISBN</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edición</th>
                <th>Año</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaLibro = new MvcController();
                $vistaLibro->vistaLibrosController();
                $vistaLibro->borrarLibrosController();
            ?>
        </tbody>
    </table>
    <?php
        if(isset($_GET["action"])){
            if($_GET["action"] == "cambio"){
                echo "Cambio exitoso";
            }
        }
    ?>