
<!------------------------------------------------BODY---------------------------------------------------------->
<body>
    <!-- Subtitulo -->
    <div class='w-100 d-flex align-items-center justify-content-center text-center mt-3'>
      <h1 class='text-info fw-bold'><?php echo $subtitulo; ?></h1>
    </div>

    <!-- Botones -->
    <div class="m-lg-3">
    <a 
        href="" 
        onclick="seleccionaUsuario(<?php echo 1 . ',' . 1 ?>);" 
        class="btn btn-success regresar_Btn" 
        data-bs-toggle="modal" 
        data-bs-target="#modalUsuario">
        Agregar
      </a>
        <a href="<?php echo base_url('eliminados_usuarios'); ?>" type="button" class="btn btn-danger">Eliminados</a>
        <a class="btn btn-primary" href="<?php echo base_url('/principal')?>">Regresar</a>
        <button type="button" class="btn btn-warning">Exportar</button> 
      </div>

    <hr/>
    <!-- Tabla de registros -->
    <div class='container__scroll'>
      <table class="table table-striped table-inverse table-responsive mt-5 m-lg-2" id="dataTable">
        <thead class="thead-inverse">
          <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Correo electronico</th>
            <th>Usuario crea</th>
            <th>Estado</th>
            <th colspan="2">Acciones</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach( $usuario as $row ) { ?>
              <tr>
                <td scope="row"><?php echo $row['id']?></td>
                <td class="text-capitalize"><?php echo $row['usuario']?></td>
                <td class="text-capitalize"><?php echo $row['email']?></td>
                <td class="text-capitalize"><?php echo $row['usuario_crea']?></td>
                <td><?php echo $row['estado']?></td>
                <td>
                <input 
                  href="#" 
                  onclick="seleccionaUsuario(<?php echo $row['id'] . ',' . 2 ?>);" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modalUsuario" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/editar.png" 
                  title="Editar Registro"/>
                  &nbsp;
                  <input 
                  href="#" 
                  data-href="<?php echo base_url('/usuarios/cambiarEstado') . '/' .$row['id']. '/' .'E'; ?>" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modal-confirma" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/borrar.png" 
                  title="Borrar Registro" />
                </td>
              </tr>
              <?php } ?>
          </tbody>
      </table>
    </div>

    <!-- Modal -->
  <form method="POST" action="<?php echo base_url() ?>usuarios/insertar" autocomplete="off">
    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h1 class="modal-title fs-5" id="tituloModal">Agregar un nuevo Cargo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <input type="text" class='input_valor' name="id" id="id" hidden>
              <input type="text" class='input_valor' name="tp" id="tp" hidden>
            
              <label for="usuario">Nombre de usuario</label>
              <input type="text" placeholder='Nombre de usuario' class='input_valor' name="usuario" id="usuario" required>
                <br/>
                <label for="email">Correo electronico</label>
                <input type="email" placeholder='micorreo@gmail.com' class='input_valor' name="email" id="email" required>
                
                <br/>
              <label for="password">Contraseña</label>
              <input type="password" placeholder='************' class='input_valor' name="password" id="password" required>
                <hr/>

              <select id="idUsuarioCrea" name="idUsuarioCrea">
                <?php foreach($usuario as $dato ) { ?>
                    <option value="<?php echo $dato['id']?>"><?php echo $dato['usuario']?></option>
                <?php } ?>
              </select>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" id="btn_Guardar">Grabar</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal Confirma Eliminar -->
  <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Usuario</h5>
                    
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Eliminar éste Usuario?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close" data-bs-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>
       <!-- Modal Elimina -->

</body>

<script>
  //! 1 === Agregar pais, 2 === Actualizar pais
  function seleccionaUsuario(id, tp) {
    if (tp == 2) {
      dataURL = "<?php echo base_url('/usuarios/buscarUsuario'); ?>" + "/" + id;
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {        
          $("#tp").val(2);  
          $("#id").val( id );
          $("#usuario").val(rs[0]['usuario']);
          $("#email").val(rs[0]['email']);
          $("#btn_Guardar").text('Actualizar');
          $("#modalCargo").modal("show");
          document.getElementById('tituloModal').innerText = "Actualizar Usuario";
        }
      })
    }else{
      $("#tp").val(1);
      $("#usuario").val('');
      $("#email").val('');
    
    }
  };

     //!Cerrar modal eliminar
    $('.close').click(function() {
      $("modal-confirma").modal("hidde");
    });

    //!Confirmar eliminación
    $('#modal-confirma').on('show.bs.modal', function (event) {
      
      $(this).find(".btn-ok").attr("href", $(event.relatedTarget).data("href"));
      
    })


    $("#usuarioCrea").change(function() {
        const id = $(this).val();
        console.log(id)
    })
  
</script>