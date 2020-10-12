<?php
    session_start();
    if(!$_SESSION["validar"]){
        header("location:index.php?action=ingresar");
        exit();
    }
?>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registrar libro</h5>
            <form method="post" class="form-signin">
              <div class="form-label-group">
              <label for="inputEmail">ISBN</label>
                <input type="text" name="ISBN" class="form-control" placeholder="ISBN" required autofocus>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Autor</label>
                <input type="text" name="autor" class="form-control" placeholder="Autor" required>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Editorial</label>
                <input type="text" name="editorial" class="form-control" placeholder="Editorial" required>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Edicion</label>
                <input type="text" name="edicion" class="form-control" placeholder="Edicion" required>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Año</label>
                <input type="number" min="1900" max="2020" name="ano" class="form-control" placeholder="Año" required>
                
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php

    $registro_libro = new MvcController();
    $registro_libro->registroLibroController();

    //verificar la url correcta
    if(isset($_GET['action'])){
        if($_GET['action']=="ok_libro"){
            echo "Registro Exitoso";
        }
    }


?>