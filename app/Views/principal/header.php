<!DOCTYPE html>
<html lang="es">

<!------------------------------------------------HEAD---------------------------------------------------------->
<head>
    <meta charset="utf-8" />
    <script type="text/javascript" src="<?php echo base_url(); ?>boostrap-5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/script.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url('/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('/bootstrap/bootstrap.min.css')?>" />
    <link rel="stylesheet" href="<?php echo base_url('/css/styleHeader.css')?>" />
    <script src="<?php echo base_url(); ?>/css/jquery-3.6.0.js"></script>
   
</head>


<!-----------------------------------------------------HEADER----------------------------------------------------->
<header class='header__container'>
    <h2 class='header__title'>devLass</h2> 
    <div class='header__container-center'>
        <h1><?php echo $titulo; ?></h1>
        <span class='header__name'>-<?php echo $nombre; ?></span>
    </div>
    <!-- <a class='header__logo-link' href='https://www.sena.edu.co/es-co/Paginas/default.aspx' target="_blank">
        <img class='header__logo-sena' src="<?php echo base_url('/images/logo1.png') ?>" alt="logo">
    </a> -->

    <a type="button" class="btn btn-outline-danger" href="<?php echo base_url('auth/salir')?>" >Cerrar sesión</a>
</header>


<!-----------------------------------------------------NAVBAR----------------------------------------------------->
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class='container-fluid'>

        <div class='d-flex justify-content-center align-items-center'>
            <svg svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
            <path d="
                M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 
                .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 
                .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 
                7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"
            />
            </svg>
            &nbsp;
            <a class="navbar-brand" href="<?php echo base_url('/principal') ?>">Inicio</a>
        </div>
    
        <div class="collapse navbar-collapse w-100 d-flex align-items-center text-center justify-content-center" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                
                <li class="nav-item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ubicación
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/paises')?>">Pais</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/departamentos')?>">Departamento</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/municipios')?>">Municipio</a></li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/cargos')?>">Cargos</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Empleados
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url('/empleados')?>">Administrar</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url('/salarios')?>">Salarios</a></li>
                    </ul>
                </li>
                <?php
                 if($rol == 'admin') { ?>
                   <?php echo '<li class="nav-item">'; ?>
                   <?php echo '<a class="nav-link" href="'.base_url('/usuarios').'">Usuarios</a>'; ?>
                   <?php echo '</li>'; ?>

                <?php } ?>
            
            </ul>
        </div>

    </div>
</nav>
