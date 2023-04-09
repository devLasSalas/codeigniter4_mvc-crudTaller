
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
          onclick="seleccionaDpto(<?php echo 1 . ',' . 1 ?>);" 
          class="btn btn-success regresar_Btn" 
          data-bs-toggle="modal" 
          data-bs-target="#modalDepartamento">
          Agregar
        </a>
        <a href="<?php echo base_url('eliminados_dpto'); ?>"  class="btn btn-danger">Eliminados</a>
        <a class="btn btn-primary" href="<?php echo base_url('/principal')?>">Regresar</a>
        <button type="button" class="btn btn-warning">Exportar</button> 
      </div>

    <hr/>
    <!-- Tabla de registros -->
    <div class='container__scroll'>
      <table class="table table-striped table-inverse table-responsive mt-5 m-lg-2" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-inverse">
          <tr>
            <th>Id Pais</th>
            <th>Pais Perteneciente</th>
            <th>Id Departamento</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th colspan="2">Acciones</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach($departamento as $row) { ?>
              <tr>
                <td><?php echo $row['P_id']?></td>
                <td><?php echo $row['P_nombre']?></td>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['estado']?></td>
                <td>
                <input 
                  href="#" 
                  onclick="seleccionaDpto(<?php echo $row['id'] . ',' . 2 ?>);" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modalDepartamento" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/editar.png" 
                  title="Editar Registro"/>
                    &nbsp;
                <input 
                  href="#" 
                  data-href="<?php echo base_url('/departamentos/cambiarEstado') . '/' .$row['id']. '/' .'E'; ?>" 
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

    <!-- Modal nuevo registro -->
  <form method="POST" action="<?php echo base_url() ?>departamentos/insertar" autocomplete="off">
    <div class="modal fade" id="modalDepartamento" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo Departamento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input id="tp" name="tp"/>
            <input id="id" name="id" hidden/>
            <!-- <input type="text" placeholder='Id de país' class='input_valor' id="id_pais" name="id_pais"> -->
            <select name="id_pais" id="id_pais">
              <?php foreach( $pais as $row ) { ?>
                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>
                <?php } ?>
            </select>
            <input type="text" placeholder='Nombre del departamento' class='input_valor' id="nombre" name="nombre">
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
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Eliminación de Registro</h5>
                    
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Eliminar éste Registro?</p>
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
  function seleccionaDpto(id, tp) {
    if (tp == 2) {
      dataURL = "<?php echo base_url('/departamentos/buscar_Departamento'); ?>" + "/" + id;
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {        
          $("#tp").val(2);  
          $("#id").val( id );
          $("#id_pais").val(rs[0]['id_pais']);
          $("#nombre").val(rs[0]['nombre']);
          $("#btn_Guardar").text('Actualizar');
          $("#modalDepartamento").modal("show");
          document.getElementById('exampleModalLabel').innerText = 'Actualizar departamento';
        }
      })
    }else{
      $("#tp").val(1);
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
</script>