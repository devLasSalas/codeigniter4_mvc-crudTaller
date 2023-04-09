 $(document).ready(function() {
      
       $('#pais_select').change(function() {
         var paisSelectId = $(this).val();/* Obtener el id seleccionado  */
         
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
                 select.appendChild(option);
               }
       
             }
           })  
       })
    
      });