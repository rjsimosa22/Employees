$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listMovementsCash').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listMovementsCash",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'description', name: 'description'},
            { data: 'abreviation' },
            { data: 'type' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-movementscash', function () {
        var MovementsCash = $(this).data("id").split('/');
        var MovementsCash_id = MovementsCash[0];
        var MovementsCash_name = MovementsCash[1];

        $.get('listMovementsCash/' + MovementsCash_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-movementscash').val('edit');
            $('#btn-movementscash').text('editar');

            // Combo de tipo de movimiento
            $('#MovementsCashtype').val('');
            $('#MovementsCashtype').empty();
            var TypeMovement=data.TypeMovement;
            var select=document.getElementsByName('MovementsCashtype')[0];
                            
            for (value in TypeMovement) {
                var option=document.createElement("option");
                    option.value=TypeMovement[value]['id'];
                    option.text=TypeMovement[value]['description'];
                    select.add(option);
            }

            // Combo de estatus
            $('#MovementsCashstatus').val('');
            $('#MovementsCashstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('MovementsCashstatus')[0];
                            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

            //Register data
            $('#tittleMovementsCash').text('Editar');
            $('#tittleMovementsCashHr').text('Editar');
            $('#MovementsCashid').val(data.MovementsCash[0]['id']);
            $('#MovementsCashstatus').val(data.MovementsCash[0]['status']);
            $('#MovementsCashtype').val(data.MovementsCash[0]['id_type_movement']);
            $('#MovementsCashdescription').val(data.MovementsCash[0]['description']);
            $('#MovementsCashabreviation').val(data.MovementsCash[0]['abreviation']);
        })
    });

    $('body').on('click', '.add-movementscash', function () {
        $('#tittleMovementsCash').text('Registrar');
        $('#tittleMovementsCashHr').text('Registrar');
        $("#btn-movementscash").text("Registrar");
    
        $.post(SITEURL + "/add",function(data){
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-movementscash').val('add');
                
                // Combo de tipo de movimiento
                $('#MovementsCashtype').val('');
                $('#MovementsCashtype').empty();
                var TypeMovement=data.TypeMovement;
                var select=document.getElementsByName('MovementsCashtype')[0];
                             
                for (value in TypeMovement) {
                    var option=document.createElement("option");
                        option.value=TypeMovement[value]['id'];
                        option.text=TypeMovement[value]['description'];
                        select.add(option);
                }

                // Combo de estatus
                $('#MovementsCashstatus').val('');
                $('#MovementsCashstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('MovementsCashstatus')[0];
                             
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#MovementsCashid').val('');
                $('#MovementsCashtype').val('1');
                $('#MovementsCashstatus').val('1');
                $('#MovementsCashdescription').val('');
                $('#MovementsCashabreviation').val('');
            }    
        });		
    });

    $('body').on('click', '#delete-movementscash', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var MovementsCash=$(this).data("id").split('/');
        var MovementsCash_id=MovementsCash[0];
        var MovementsCash_name=MovementsCash[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+MovementsCash_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listMovementsCash/delete/"+MovementsCash_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+MovementsCash_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearMovementsCash();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+MovementsCash_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-movementscash', function () {
    
        if($("#btn-movementscash").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
       
        var MovementsCashid=$('#MovementsCashid').val();
        var MovementsCashtype=$('#MovementsCashtype').val();
        var MovementsCashstatus=$('#MovementsCashstatus').val();
        var MovementsCashdescription=$('#MovementsCashdescription').val();
        var MovementsCashabreviation=$('#MovementsCashabreviation').val();

        var yes=1;
        if(!MovementsCashabreviation || !MovementsCashdescription || !MovementsCashstatus || !MovementsCashtype) {
            yes=0;
        } 
    
        if(yes > 0) {

            $("#btn-coins").attr("disabled", true);

            $.ajax({
                data:{"action":action,"MovementsCashid":MovementsCashid,"MovementsCashabreviation":MovementsCashabreviation,"MovementsCashdescription":MovementsCashdescription,"MovementsCashstatus":MovementsCashstatus,"MovementsCashtype":MovementsCashtype},
                url: SITEURL + "/listMovementsCash/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+MovementsCashdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearMovementsCash();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+MovementsCashdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearMovementsCash() {

    $('#MovementsCashid').val('');
    $('#MovementsCashtype').val('1');
    $('#MovementsCashstatus').val('1');
    $('#MovementsCashdescription').val('');
    $('#MovementsCashabreviation').val('');
    $("#btn-movementscash").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listMovementsCashRefres').dataTable();
    oTable.fnDraw(false);
}