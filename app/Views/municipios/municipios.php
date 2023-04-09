
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
          onclick="seleccionaMunicipio(<?php echo 1 . ',' . 1 ?>);" 
          class="btn btn-success regresar_Btn" 
          data-bs-toggle="modal" 
          data-bs-target="#modalMunicipio">
          Agregar
        </a>
        <a href="<?php echo base_url('eliminados_municipios'); ?>"  class="btn btn-danger">Eliminados</a>
        <a class="btn btn-primary" href="<?php echo base_url('/principal')?>">Regresar</a>
        <button type="button" class="btn btn-warning">Exportar</button> 
      </div>

    <hr/>
    <!-- Tabla de registros -->
    <div class='container__scroll'>
      <table class="table table-striped table-inverse table-responsive mt-5 m-lg-2" id="dataTable" width="100%" cellspacing="0">
        <thead class="thead-inverse">
          <tr>
            <th>Id País</th>
            <th>Nombre País Perteneciente</th>
            <th>Id Departamento</th>
            <th>Nombre Departamento Perteneciente</th>
            <th>Id Municipio</th>
            <th>Nombre</th>
            <th>Estado</th>
            <th colspan="2">Acciones</th>
          </tr>
          </thead>
          <tbody>
            <?php foreach( $municipio as $row ) { ?>
              <tr>
                <!-- TODO: Añadir id, nombre de paises: -->
                <td><?php echo $row['P_id']?></td>
                <td><?php echo $row['P_nombre']?></td>
                <!--  -->
                <td scope="row"><?php echo $row['Dpto_id']?></td>
                <td><?php echo $row['Dpto_nombre']?></td>
                <td class="text-capitalize"><?php echo $row['id']?></td>
                <td class="text-capitalize"><?php echo $row['nombre']?></td>
                <td><?php echo $row['estado']?></td>
                <td>
                <input 
                  href="#" 
                  onclick="seleccionaMunicipio(<?php echo $row['id'] . ',' . 2 ?>);" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modalMunicipio" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/editar.png" 
                  title="Editar Registro"/>
                  &nbsp;
                  <input 
                  href="#" 
                  data-href="<?php echo base_url('/municipios/cambiarEstado') . '/' .$row['id']. '/' .'E'; ?>" 
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
  <form method="POST" action="<?php echo base_url() ?>municipios/insertar" autocomplete="off">
    <div class="modal fade" id="modalMunicipio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo Municipio</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input hidden id="tp" name="tp"/>
            <input hidden id="id" name="id"/>

            <label>País perteneciente:</label>
            <select id="paises">
              <option value="0">Elija una opcion</option>
              <?php foreach($pais as $row) { ?>
                <option value="<?php echo $row['id']?>"><?php echo $row['nombre'] ?></option>
              <?php } ?>
            </select>

            <hr/>

              <label>Departamento:</label>
              <select id="dpto" name="dpto"> 
                <!-- Select dinamico -->
                <!-- Option agregado desde el js -->
              </select>

            <hr/>

            <label>Nombre Municipio:</label>
            <input type="text" placeholder="Ej: Malambo" id="nombre" name="nombre"/>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
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

  
  
  function seleccionaMunicipio( id, tp ) {

     if( tp === 2 ) {
       /* mostrar informacion de un municipio por id */
       dataURL = "<?php echo base_url('/municipios/buscar_municipio'); ?>" + "/" + id;
       $.ajax({
         type: "POST",
         url: dataURL,
         dataType: "json",
         success: function(rs) {        
          
          $("#tp").val(2);  
          $("#id").val( id );
          $("#paises").val(rs[0]['P_id']);
          // $("#dpto").text(rs[0]['Dpto_id']);
          $("#nombre").val(rs[0]['nombre']);
          $("#btn_Guardar").text('Actualizar');
          $("#modalPaises").modal("show");
          document.getElementById('exampleModalLabel').innerText = 'Actualizar municipio'
          for( var i = 0; i < rs.length; i++) {
            var select = document.getElementById('dpto');
            var option = document.createElement('option');
                option.value = rs[i].Dpto_id;
                option.text = rs[i].Dpto_nombre;
                select.appendChild(option);
                
          }
        }
      })
     }else if( tp === 1 ) {
      $("#tp").val(1);  
          $("#id").val('');
          $('#dpto').val('0')
          $("#paises").val('0');
          $("#nombre").val('');

     }
  }
  /* Select dinamico */
  $(document).ready(function() {
      
      $('#paises').change(function() {
        var paisSelectId = $(this).val();/* Obtener el id seleccionado  */
        
        if( paisSelectId !== '') {
          dataURL = "<?php echo base_url('/municipios/buscarDptoByIdPais'); ?>" + "/" + paisSelectId;
          $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
              var select = document.getElementById('dpto');
              select.innerHTML = '';
              for( var i = 0; i < rs.length; i++ ) {
                var option = document.createElement('option');
                option.value = rs[i].id;
                option.text = rs[i].nombre;
                select.append(option);
              }
      
            }
          })  
          
        }else if( paisSelectId == 0 ) {
         console.log('es 0')

        }
      })
   
     });
     /* Fin select dinamico */


     //!Cerrar modal eliminar
  $('.close').click(function() {
      $("modal-confirma").modal("hidde");
      /*  */
    });

    //!Confirmar eliminación
    $('#modal-confirma').on('show.bs.modal', function (event) {
      
      $(this).find(".btn-ok").attr("href", $(event.relatedTarget).data("href"));
      
    })

</script>