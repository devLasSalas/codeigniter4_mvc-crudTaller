<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('/css/styleHeader.css')?>" />
    <script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>
    
    <link rel="stylesheet" href="<?php echo base_url('/css/styleAuth.css')?>" />
</head>

<div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Inicio de Sesión</h2>
        <div class="text-center mb-5 text-dark">inicie sesión para acceder al sistema</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5" method="POST" action="<?php echo base_url() ?>auth/login" id="formulario">
            <div class="text-center">
              <img src="https://cdn.pixabay.com/photo/2016/03/31/19/56/avatar-1295397__340.png" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                width="200px" alt="profile">
            </div>

            <div class="mb-3">
              <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp"
                placeholder="Nombre de usuario">
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" name="password" id="password" placeholder="*************">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Entrar</button></div>
            <div id="emailHelp" class="form-text text-center mb-5 text-dark">Se te ha olvidado tu clave? <a href="#" class="text-dark fw-bold"> Click aqui</a>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>


<script>

    // document.getElementById('formulario').addEventListener('submit', function(e) {
    //    e.preventDefault();
       
    // })

</script>