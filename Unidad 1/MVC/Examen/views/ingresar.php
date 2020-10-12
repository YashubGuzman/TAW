<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Ingresar</h5>
            <form method="post" class="form-signin">
              <div class="form-label-group">
              <label for="inputEmail">Usuario</label>
                <input type="text" name="usuarioIngreso" class="form-control" placeholder="Usuario" required autofocus>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Password</label>
                <input type="password" name="passwordIngreso" class="form-control" placeholder="Contraseña" required>
                
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesion</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


            <?php
    $ingreso = new MvcController();
    $ingreso->ingresoUsuarioController();

    //Verificar la url correcta
    if(isset($_GET["action"])){
        if($_GET["action"]=="fallo"){
            echo "Fallo al ingresar";
        }
    }
    ?>