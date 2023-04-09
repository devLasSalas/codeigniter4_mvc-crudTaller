
<body>

  <div class="card">
    <div>
      <h1 class="titulo_Vista">Empleados Eliminados</h1>
    </div>
    <div class="card-body">

      <div class="row col-sm-12" >
      <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-5"></div>
      <div class="col-md-5ths col-lg-5ths col-xs-6 col-sm-2">        
        <a href="<?php echo base_url('/empleados'); ?>" class="btn btn-primary regresar_Btn">Regresar</a>
      </div>
      </div>

      <!-- Tabla registros -->
      <br>
      <div class="container__scroll">
        <div class="table_responsive w-100">
          <table class="table table-striped
           table-inverse table-responsive" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Nacimiento</th>
                <th>Pais</th>
                <th>Departamento</th>
                <th>Municipio Perteneciente</th>
                <th>Cargo Actual</th>
                <th>Estado</th>
                <th colspan="2">Acciones</th>
          </tr>
            </thead>
            <tbody>
              <?php foreach ($empleado as $row) { ?>
                <tr>
                    <td scope="row"><?php echo $row['id']?></td>
                    <td><?php echo $row['nombres']?></td>
                    <td class="text-capitalize"><?php echo $row['apellidos']?></td>
                    <td class="text-capitalize"><?php echo $row['nacimiento']?></td>
                    <td class="text-capitalize"><?php echo $row['Dpto_nombre']?></td>
                    <td class="text-capitalize"><?php echo $row['P_nombre']?></td>
                    <td class="text-capitalize"><?php echo $row['M_nombre']?></td>
                    <td class="text-capitalize"><?php echo $row['C_nombre']?></td>
                    <td class="text-capitalize"><?php echo $row['estado']?></td>
                    <td>
                  
                  <td style="height:0.2rem;width:1rem;">
                  <input 
                  href="#" 
                  data-href="<?php echo base_url('/empleados/cambiarEstado') . '/' .$row['id']. '/' .'A'; ?>" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modal-confirma" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/boton-de-encendido.png"
                  title="Activar Registro"/>
                  </td>
  
                </tr>
              <?php } ?>    
            </tbody>
          </table>
        </div>
      </div>
      
      <!-- Modal Confirma Eliminar -->
      <div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div style="background: linear-gradient(90deg, #838da0, #b4c1d9);" class="modal-content">
                <div style="text-align:center;" class="modal-header">
                    <h5 style="color:#98040a;font-size:20px;font-weight:bold;" class="modal-title" id="exampleModalLabel">Activación de Registro</h5>
                    
                </div>
                <div style="text-align:center;font-weight:bold;" class="modal-body">
                    <p>Seguro Desea Activar éste Registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary close" data-dismiss="modal">No</button>
                    <a class="btn btn-danger btn-ok">Si</a>
                </div>
            </div>
        </div>
    </div>
       <!-- Modal Elimina -->
    

</body>
<script>
     $('#modal-confirma').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
    });
  
  /* function eliminarDpto(id) {     
      $("#id").val(id);
      dataURL = "<?php echo base_url('eliminar_dpto'); ?>" + "/" + id + "/" + 'A';
      $.ajax({
        type: "POST",
        url: dataURL,
        dataType: "json",
        success: function(rs) {
        },
        error: function() {
                alert("No se ha Podido Activar El Registro");
            }
      })

  };
 */ 
  $('.close').click(function() {$("#modal-confirma").modal("hide");}); 
</script>