$(function(){
    let editar_principal = false;
    console.log("estamos en linea");
    $('#resultados_busqueda').hide();
    listar();

    $('#search').keyup(function()
    {
       var search = $('#search').val();
            if($('#search').val()){
                
                $.ajax({
                    url:'search.php',
                    type:'POST',
                    data:{ search },
                    success:function(respuesta){
                         let resultados = JSON.parse(respuesta);
                         let template = "";
                         resultados.forEach(resultado => {
                             template += `<li>
                                 ${resultado.name}
                             </li>`
                         });
                         $('#container').html(template);
                         $('#resultados_busqueda').show();
                    }
                });
            }
    });

    $('#formulario').submit(function(e){
       const postdatos={
           name:$('#nombre').val(),
           descripcion:$('#descripcion').val(),
           id: $('#id_oculto').val()
       };

       let url = editar_principal === false ? 'crear.php':'edit.php';
       $.post(url, postdatos, function(respuesta){
            listar();
           $('#formulario').trigger('reset');
           
       })
       e.preventDefault(); 
    });
function listar(){
    $.ajax({
        url:'listar.php',
        type:'GET',
        success: function(respuesta){
            const resultados_2 = JSON.parse(respuesta);
            let template = '';
            resultados_2.forEach(resultado_1 =>{
                template +=`
                <tr R_id="${resultado_1.id}">
                    <td>${resultado_1.id}</td>
                    <td><a href="#" class="item_nombre">${resultado_1.nombre}</a></td>
                    <td>${resultado_1.descripcion}</td>
                    <td><button class="eliminar btn btn-danger">Eliminar</button></td>
                </tr>
                `
            });
            $('#resultado').html(template);
        }


    });
    }

    $(document).on('click', '.eliminar', function(){
        if(confirm('Quiere eliminar?')){
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('R_id');
        $.post('eliminar.php', {id}, function(respuesta){
            listar();

        });
        }
    });

    $(document).on('click', '.item_nombre', function(){
        editar_principal = true;
        let elemento = $(this)[0].parentElement.parentElement;
        let id = $(elemento).attr('R_id')
        $.post('editar.php', {id}, function(respuesta){
            const editar = JSON.parse(respuesta);
            $('#nombre').val(editar.nombre);
            $('#descripcion').val(editar.descripcion);
            $('#id_oculto').val(editar.id);
            
        })
    });
});