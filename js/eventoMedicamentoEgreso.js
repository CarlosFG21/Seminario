
 $(document).ready(function(){
    $("#cbLote").change(function () { 	
        console.log("llego aqui");	
       
        let e = document.getElementById("cbLote");
        let value = e.options[e.selectedIndex].value;

        document.getElementById("txtStockDisponible").value = value;

        console.log(value);

        $.ajax({
            type: "POST",
            url: "../controlador/BDPrueba.php",
            data: {
              IdPHP : value,
            },
            success: function(data) { 

              console.log(data);
              

              let respuesta = JSON.parse(data);

            

              document.getElementById("txtId").value = respuesta[0];

              document.getElementById("txtStockDisponible").value = respuesta[4];
              document.getElementById("txtFechaVencimiento").value = respuesta[5];
              document.getElementById("txtConcentracion").value = respuesta[2];
              document.getElementById("txtPresentacion").value = respuesta[3];

              document.getElementById("txtNombre").value = respuesta[1];
              document.getElementById("txtLote").value = respuesta[6];

            



                
              let Resultado = JSON.parse(data);

              //console.log(Resultado);
            
              let lista = '';
              Resultado.forEach(e => {
               
                  lista += `
                  <option value="${e.id_opcion}">${e.nombre}</option>
                  `
                  
              
              });
              
              $('#txtPrueba').html(lista);



            }
          });


    })

});


