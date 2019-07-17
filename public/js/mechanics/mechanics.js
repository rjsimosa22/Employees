$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listMechanics').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listMechanics",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'description'},
            { data: 'abreviation' },
            { data: 'commission' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-mechanics', function () {
        var mechanics = $(this).data("id").split('/');
        var mechanics_id = mechanics[0];
        var mechanics_name = mechanics[1];
        $.get('listMechanics/' + mechanics_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-mechanics').val('edit');
            $('#btn-mechanics').text('editar');

            // Combo de comision
            $('#Mechanicsidcommission').val('');
            $('#Mechanicsidcommission').empty();
            var commission=data.commission;
            var select=document.getElementsByName('Mechanicsidcommission')[0];
            
            for (value in commission) {
                var option=document.createElement("option");
                    option.value=commission[value]['id'];
                    option.text=commission[value]['description'];
                    select.add(option);
            }

            // Combo de estatus
            $('#Mechanicsstatus').val('');
            $('#Mechanicsstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Mechanicsstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
           $('#tittleMechanics').text('Editar');
           $('#tittleMechanicsHr').text('Editar');
           $('#Mechanicsid').val(data.mechanics[0]['id']);
           $('#Mechanicsstatus').val(data.mechanics[0]['status']);
           $('#Mechanicsdescription').val(data.mechanics[0]['description']);
           $('#Mechanicsabreviation').val(data.mechanics[0]['abreviation']);
           $('#Mechanicsidcommission').val(data.mechanics[0]['id_commission']);
        })
    });

    $('body').on('click', '.add-mechanics', function () {
        $('#contentDanger').hide();
        $('#contentSuccess').hide();
        $('#btn-mechanics').val('Registrar');
        $('#btn-mechanics').text('Registrar');

        var mechanics = $(this).data("id");
        $.get('listMechanics/' + mechanics +'/edit', function (data) {
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-mechanics').val('add');
                $('#tittleMechanics').text('Registrar');
                $('#tittleMechanicsHr').text('Registrar');
                
                // Combo de comision
                $('#Mechanicsidcommission').val('');
                $('#Mechanicsidcommission').empty();
                var commission=data.commission;
                var select=document.getElementsByName('Mechanicsidcommission')[0];
                
                for (value in commission) {
                    var option=document.createElement("option");
                        option.value=commission[value]['id'];
                        option.text=commission[value]['description'];
                        select.add(option);
                }

                // Combo de estatus
                $('#Mechanicsstatus').val('');
                $('#Mechanicsstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('Mechanicsstatus')[0];
                
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#Mechanicsid').val('');
                $('#Mechanicsstatus').val('1');
                $('#Mechanicsdescription').val('');
                $('#Mechanicsabreviation').val('');
                $('#Mechanicsidcommission').val('1');
            }    
        });		
    });

    $('body').on('click', '#delete-mechanics', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var mechanics=$(this).data("id").split('/');
        var mechanics_id=mechanics[0];
        var mechanics_name=mechanics[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+mechanics_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listMechanics/delete/"+mechanics_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+mechanics_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearMechanics();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+mechanics_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-mechanics', function () {
    
        if($("#btn-mechanics").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
        
        var btn=$("#btn-mechanics").val();
        var Mechanicsid=$('#Mechanicsid').val();
        var Mechanicsstatus=$('#Mechanicsstatus').val();
        var Mechanicsdescription=$('#Mechanicsdescription').val();
        var Mechanicsabreviation=$('#Mechanicsabreviation').val();
        var Mechanicsidcommission=$('#Mechanicsidcommission').val();

        var yes=1;
        if(!Mechanicsstatus || !Mechanicsdescription || !Mechanicsabreviation || !Mechanicsidcommission) {
            yes=0;
        } 

        if(yes > 0) {

            $("#btn-mechanics").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Mechanicsid":Mechanicsid,"Mechanicsstatus":Mechanicsstatus,"Mechanicsdescription":Mechanicsdescription,"Mechanicsabreviation":Mechanicsabreviation,"Mechanicsidcommission":Mechanicsidcommission},
                url: SITEURL + "/listMechanics/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Mechanicsdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearMechanics();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+Mechanicsdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearMechanics() {

    $('#Mechanicsid').val('');
    $('#Mechanicsstatus').val('1');
    $('#Mechanicsdescription').val('');
    $('#Mechanicsabreviation').val('');
    $('#Mechanicsidcommission').val('1');
    $("#btn-mechanics").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listMechanicsRefres').dataTable();
    oTable.fnDraw(false);
}