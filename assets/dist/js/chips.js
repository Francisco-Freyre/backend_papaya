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

    $('#categoria').on('change', function(){
        let id = $(this).children('option:selected').val();
        $.ajax({
            type: 'GET',
            url: 'controller/alimentosController.php',
            data: 'accion=grupo&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                $('#alimento_id').empty();
                $('#alimento_id').append(`<option value="0">Selecciona un alimento</option>`);
                resp.forEach(alimento => {
                    let dataAlimento = `<option data-cantidad=`+alimento.cantidad+` data-unidad=`+alimento.unidad+` value=`+alimento.id+`>`+alimento.nombre+`</option>`;
                    $('#alimento_id').append(dataAlimento);
                });
            },
            error:function(respuesta){
                console.log(respuesta);
            }  
        });
    });

    $('#alimento_id').on('change', function(){
        let unidad = $(this).children('option:selected').data('unidad');
        let cantidad = $(this).children('option:selected').data('cantidad');
        $('#unidad').val(unidad);
        $('#cantidad').val(cantidad);
    });

    $('#enviar').on('submit', function(e){
        e.preventDefault();
        let datos = new FormData(this);

        $.ajax({
            type:'POST',
            data: datos,
            url: 'controller/ingredientesController.php',
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
                let resultado = data;
                let cambiar = resultado.cambiar == 0 ? 'No' : 'Si';
                let renglon = `
                <tr>
                    <td>`+cambiar+`</td>
                    <td>`+resultado.nombre+`</td>
                    <td>`+resultado.result+`</td>
                    <td class="kcal">`+resultado.kcal+`</td>
                    <td class="carbo">`+resultado.carbohidratos+`</td>
                    <td class="prote">`+resultado.proteinas+`</td>
                    <td class="grasa">`+resultado.lipidos+`</td>
                    <td> <a class="btn btn-danger cerrar" data-id=`+resultado.id+`>Borrar</a></td>
                </tr>
                `;
                $('#tabla').append(renglon);
                $('#energia').val(resultado.totalKcal);
                $('#carbos').val(resultado.totalCarbo);
                $('#protes').val(resultado.totalProte);
                $('#grasas').val(resultado.totalGrasas);
                $('#nombre').val(resultado.platillo);
                $('#unidad').val('');
                $('#cantidad').val('');
                $('#equivalente').val('');
                $('#alimento_id option[value="0"]').attr('selected', true);
                $('#categoria').val('0');
            },
            error: function(data){
                console.log(data);
            }
        });
    });

    $(document).on('click', '.cerrar',function(){
        boton = $(this);
        let id = $(this).data('id');
        $.ajax({
            type: 'GET',
            url: 'controller/ingredientesController.php',
            data: 'accion=borrar&id='+id,
            dataType: 'json',
            success:function(respuesta){
                let resp = respuesta;
                if(resp.resultado){
                    let kcal = boton.parent().parent().children('.kcal').text();
                    let carbo = boton.parent().parent().children('.carbo').text();
                    let prote = boton.parent().parent().children('.prote').text();
                    let grasa = boton.parent().parent().children('.grasa').text();
                    let energia = $('#energia').val();
                    let carbos = $('#carbos').val();
                    let protes = $('#protes').val();
                    let grasas = $('#grasas').val();
                    $('#energia').val(energia - kcal);
                    $('#carbos').val(carbos - carbo);
                    $('#protes').val(protes - prote);
                    $('#grasas').val(grasas - grasa);
                    $('#nombre').val(resp.platillo);
                    boton.parent().parent().remove();
                }
                else{
                    alert("No se pudo eliminar el ingrediente");
                }
            },
            error:function(respuesta){
                console.log(respuesta);
            }  
        });
    });

});