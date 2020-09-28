<?php
$carreras = Conexion::seleccion()->query("SELECT * from carreras");
?>
<h1>Registro de Usuario</h1>
<form method="POST">
    <input type="text" name="usuarioRegistro" placeholder="Usuario" required>
    <input type="password" name="passwordRegistro" placeholder="Contraseña" required>
    <input type="email" name="emailRegistro" placeholder="Email" required>
    <p>Carrera</p>
    <select name="carrera" >
    <option value="0">Seleccione</option>
    <?php
        while ($valores = mysqli_fetch_array($carreras)){
            echo '<option value="'.$valores['id_carrera'].'">'.$valores['carrera'].'</option>';
        }
    ?>
    </select>
    <input type="submit" value="Enviar">
</form>

<?php

    $ingreso= new MvcController();
    $ingreso->registroUsuariosController();

    //verificar la url correcta
    if(isset($_GET['action'])){
        if($_GET['action']=="ok"){
            echo "Registro Exitoso";
        }
    }


?>