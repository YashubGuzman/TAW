<?php
    session_start();
    if(!$_SESSION["validar"]){
          header("location:index.php?action=ingresar");
        exit();
    }
?>

<h1> Materias </h1>
    <button><a href="index.php?action=nuevamateria" style="text-decoration:none" >Nueva materia</a></button>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Materia</th>
                <th>Clave</th>
                <th>Carrera</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaMateria = new MvcController();
                $vistaMateria->vistaMateriaController();
                $vistaMateria->borrarMateriaController();
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