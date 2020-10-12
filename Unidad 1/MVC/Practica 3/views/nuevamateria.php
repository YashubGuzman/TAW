<?php
$carrera = Conexion::seleccion()->query("SELECT * from carreras");
?>
<h1>Registro de materias</h1>
<form method="POST">
    <input type="text" name="materiaRegistro" placeholder="Materia" required>
    <input type="text" name="claveRegistro" placeholder="Clave" required>
    <p>Carrera</p>
    <select name="carrera" >
    <option value="0">Seleccione</option>
    <?php
        while ($valores = mysqli_fetch_array($carrera)){
            echo '<option value="'.$valores['id_carrera'].'">'.$valores['carrera'].'</option>';
        }
    ?>
    </select>

    <input type="submit" value="Enviar">
</form>

<?php

    $ingreso= new MvcController();
    $ingreso->registroMateriaController();

    //verificar la url correcta
    if(isset($_GET['action'])){
        if($_GET['action']=="ok_materia"){
            echo "Registro Exitoso";
        }
    }


?>