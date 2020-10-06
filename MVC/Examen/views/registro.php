


<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Registro</h5>
            <form method="post" class="form-signin">
              <div class="form-label-group">
              <label for="inputEmail">Usuario</label>
                <input type="text" name="usuarioRegistro" class="form-control" placeholder="Usuario" required autofocus>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Password</label>
                <input type="password" name="passwordRegistro" class="form-control" placeholder="Contraseña" required>
                
              </div>

              <div class="form-label-group">
              <label for="inputPassword">Email</label>
                <input type="email" name="emailRegistro" class="form-control" placeholder="Email" required>
                
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar Usuario</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

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