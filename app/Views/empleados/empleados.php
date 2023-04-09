
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
          onclick="seleccionaEmpleado(<?php echo 1 . ',' . 1 ?>);" 
          class="btn btn-success regresar_Btn" 
          data-bs-toggle="modal" 
          data-bs-target="#modalEmpleado">
          Agregar
        </a>
        <a href="<?php echo base_url("eliminados_empleados")?>" type="button" class="btn btn-danger">Eliminados</a>
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
              <?php foreach( $empleado as $row ) { ?>
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
                  <input 
                  href="#" 
                  onclick="seleccionaEmpleado(<?php echo $row['id'] . ',' . 2 ?>);" 
                  data-bs-toggle="modal" 
                  data-bs-target="#modalEmpleado" 
                  type="image" 
                  src="<?php echo base_url(); ?>/icons/editar.png" 
                  title="Editar Registro"/>
                    &nbsp;
                  <input 
                  href="#" 
                  data-href="<?php echo base_url('/empleados/cambiarEstado') . '/' .$row['id']. '/' .'E'; ?>" 
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
  <form method="POST" action="<?php echo base_url() ?>empleados/insertar" autocomplete="off">
    <div class="modal fade" id="modalEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar un nuevo Empleado</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <input hidden id="tp" name="tp">
          <input hidden id="id" name="id">
            
            <div>
              <span>Nombres:</span>
              <input 
              type="text" 
              placeholder='Nombres' 
              class='input_valor' 
              id="nombres" 
              name="nombres"
              />
            </div>
            &nbsp;
            <div>
              <span>Apellidos:</span>
              <input 
              type="text" 
              placeholder='Apellidos' 
              class='input_valor' 
              id="apellidos" 
              name="apellidos"
              />
            </div>
            &nbsp;
            <div>
              <span>Año nacimiento:</span>
              <input 
              type="text" 
              placeholder='Año de nacimiento' 
              class='input_valor' 
              id="nacimiento" 
              name="nacimiento">
            </div>
                <hr/>

            <span>Seleccione un cargo:</span>
            <select name="cargos" id="cargos">
            <option value="0">Elija un cargo</option>
              <?php foreach( $cargo as $row ) { ?>
                <option value="<?php echo $row['id']?>">
                <?php echo $row['nombre']?>
                </option>
                <?php } ?>
            </select>    

                <hr/>

              <span>Seleccione un País:</span>
                <select id="paises" name="paises">
                  <option value='0'>Elija un pais</option>
                <?php foreach($pais as $row) { ?>
                  <option value="<?php echo $row['id']?>">
                    <?php echo $row['nombre'] ?>
                  </option>
                <?php } ?>
                </select>

                <hr/>
                
                <span>Seleccione un departamento:</span>
                <select id="departamentos">
                  <option selected>Elija un dpto</option>
                </select>

                <hr/>

                <span>Seleccione un municipio:</span>   
                <select id="municipios" name="municipios">
                  <option selected>Elija un municipio</option>
                </select>
                
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary cancel" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success" id="btn_Guardar">Grabar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
<!-- Fin modal  -->


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

  

function seleccionaEmpleado( id, tp ) {

if( tp === 2 ) {
  console.log('Update...')

  dataURL = "<?php echo base_url("/empleados/buscar_empleado"); ?>" + "/" + id;
  $.ajax({
    type: 'POST',
    url: dataURL,
    dataType: "json",
    
    success: function(rs) {
      // console.log(rs);
    $("#municipios").empty();
      $("#tp").val(2);
      $("#id").val( id );
      $("#nombres").val(rs[0]['nombres']);
      $("#apellidos").val(rs[0]['apellidos']);
      $("#nacimiento").val(rs[0]['nacimiento']);
      $("#cargos").val(rs[0]['C_id']);
      $("#btn_Guardar").text('Actualizar');
      document.getElementById('exampleModalLabel').innerText = 'Actualizar empleado';
  

      traerInfoPaisDptoMuni(rs[0]['M_id']);
     
        
      }
  })

  

}else if( tp === 1 ) {
  console.log('Create...')

  $("#tp").val(1);
  $("#nombres").val('');
  $("#apellidos").val('');
  $("#nacimiento").val('');
  $("#cargos").val('0');
  $("#paises").val('0');
  $("#departamentos").val('0');
  $("#municipios").val('0');
  
  }
  
}


//Traer informacion Pais- Dpto- Muni
function traerInfoPaisDptoMuni( idMuni ) {
   dataURL = "<?php echo base_url() ?>" + "empleados/buscar_municipio_dpto_pais" + "/" + idMuni;

  $.ajax({
    url: dataURL,
    type: "POST",
    dataType: "json",
    success: function( result ) {
      for(let i = 0; i < result.length; i++) {
        // $("#paises").empty();
        $("#departamentos").empty();
        $("#municipios").empty();
        
        
        //Info pais
        let idPais = result[i]['P_id'];
        let nombrePais = result[i]['P_nombre'];
        $("#paises").val( idPais );
        // $("#paises").append(`<option value="${ idPais }">${ nombrePais }</option>`)
        
        //Info Departamento
        llenarSelect('departamentos', result[i]['Dpto_id'], result[i]['Dpto_nombre']);
        //Info Municipio
        llenarSelect('municipios', result[i]['id'], result[i]['nombre']);

      }
    }
  })
}

//Llenar info Selects
function llenarSelect(select, id, nombre) {
  $(`#${select}`).append(`<option value="${ id }">${ nombre }</option>`)
}



//Capturar valores de los selects
  
  $('#paises').change(function() {
    var paisSelectId = $(this).val();/* Obtener el id seleccionado del pais  */
    showSelectDinamico(paisSelectId, 'departamentos', 0,"/empleados/traer_dptos" )
  });      

  $('#departamentos').change(function() {
        var dptoSelectId = $(this).val();
        showSelectDinamico(dptoSelectId, 'municipios', 0,"/empleados/traer_municipios" )
  })


//Funcion llenar selects
function showSelectDinamico(id, nameSelect, id_sel, myUrl) {
  dataURL = "<?php echo base_url() ?>" + myUrl + "/" + id;

  $.ajax({
    url: dataURL,
    type: "POST",
    dataType: "json",
    success: function( result ) {
      $(`#${nameSelect}`).empty();
      $(`#${nameSelect}`).append('<option>Elija una opción</option>')
      for(let i = 0; i < result.length; i++) {
        let id = result[i]['id'];
        let nombre = result[i]['nombre'];
        $(`#${nameSelect}`).append(`<option value="${ id }">${ nombre }</option>`)

      }if( id_sel !== 0) {
        $(`#${nameSelect}`).val(id_sel);
      }
    }
  })
}




//!Confirmar eliminación
$('#modal-confirma').on('show.bs.modal', function (event) {
  
  $(this).find(".btn-ok").attr("href", $(event.relatedTarget).data("href"));
  
})
//!Cerrar modal eliminar
$('.close').click(function() {
    $("modal-confirma").modal("hidde");
    /*  */
  });

</script>
