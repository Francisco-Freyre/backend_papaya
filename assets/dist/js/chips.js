$(document).ready(function (){

    $('#ingrediente').keypress(function(e){
        let contenido = $('#ingrediente').val();
        let id = $('#ingrediente').data('id');
        let formdata = new FormData();
            formdata.append('accion', 'insertar-ingrediente');
            formdata.append('id', id);
            formdata.append('palabra', contenido);
        if(e.which == 13 || e.which == 44){
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'controller/platilloController.php',
                data: formdata,
                dataType: 'json',
                contentType: false,
                processData: false,
                async: true,
                cache: false,
                success:function(respuesta){
                    let resp = respuesta;
                    if(resp.respuesta === "exito"){
                        let chip = $(`<div class="chip" id="aroma`+resp.id+`">`+contenido+`<span id="closebtn" class="closebtn" data-id="`+resp.id+`">&times;</span></div>`);
                        $('#chipss').append(chip);
                        $('#ingrediente').val("");
                    }
                    else if(resp.respuesta === "error"){
                        alert("No se pudo añadir el ingrediente: " + contenido);
                    }
                },
                error:function(respuesta){
                    console.log(respuesta);
                }   
            }); 
        }
    });

    $(document).on('click', '.closebtn',function(){
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controller/platilloController.php',
            data: 'accion=borrar-platillo&&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.respuesta === "exito"){
                    $('#aroma'+id).hide();
                }
                else if(resp.respuesta === "error"){
                    alert("No se pudo eliminar el aroma");
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }  
        });
    });
});