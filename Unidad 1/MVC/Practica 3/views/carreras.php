<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }
?>

<h1> Carreras </h1>
    <button><a href="index.php?action=nuevacarrera" style="text-decoration:none" >Nueva carrera</a></button>
    <br>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th colspan="3">Carrera</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $vistaCarrera = new MvcController();           
                $vistaCarrera->vistaCarrerasController();
                $vistaCarrera->borrarCarreraController();
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