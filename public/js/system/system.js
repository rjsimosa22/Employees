$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready( function () {

    $('#listSystem').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            data:{"bd":$('#DBactual').val()},
            url: SITEURL + "/listSystem",
            type: 'GET',
        },

        columns: [
            {data:'id',name:'id','visible':false},
            {data:'description'},
            {data:'abreviation'},
            {data:'status'},
            {data:'date','visible':false},
            {data:'action'},
        ],
        order: [[0, 'desc']]
    });

    // Editar system
    $('body').on('click', '.edit-system', function () {
        $('#tittle').text('Editar');
        $('#tittleHorz').text('Editar');
        $("#btn-system").text("Editar");
        
        var system = $(this).data("id").split('/');
        var system_id = system[0];
        var system_name = system[1];
     
        $.get('listSystem/' + system_id +'/edit?id='+system_id+'&bd='+$('#DBactual').val(), function (data) {

            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-system').val('edit');

            // Combo de estatus
            $('#Systemstatus').val('');
            $('#Systemstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Systemstatus')[0];
             
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

            //Register data
            $('#Systemid').val(data.system[0]['id']);
            $('#Systemstatus').val(data.system[0]['status']);
            $('#Systemdescription').val(data.system[0]['description']);
            $('#Systemabreviation').val(data.system[0]['abreviation']);
        })
    });

    // Add system
    $('body').on('click', '.add-system', function () {
        $('#tittle').text('Registrar');
        $('#tittleHorz').text('Registrar');
        $("#btn-system").text("Registrar");

        $.post(SITEURL + "/add",function(data){
            
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-system').val('add');
            
                // Combo de estatus
                $('#Systemstatus').val('');
                $('#Systemstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('Systemstatus')[0];
                         
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
            
                //Register data
                $('#Systemid').val('');
                $('#Systemstatus').val('1');
                $('#Systemdescription').val('');
                $('#Systemabreviation').val('');
            }    
        });		
    });
    

    // Eliminar system
    $('body').on('click', '#delete-system', function () {
        var system=$(this).data("id").split('/');
        var system_id=system[0];
        var system_name=system[1];
        
        if(confirm("Está seguro que desea eliminar el registro: "+system_name.toUpperCase()+" !")) {
            $.ajax({
                data:{"id":system_id,"bd":$('#DBactual').val()},
                url: SITEURL + "/listSystem/delete/"+system_id,
                type: "GET",
                
                success: function (data) {
                    $('#mensSuccess').text('El registro '+system_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearSystem(); 
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El cliente '+client_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-system', function () {
    
        if($("#btn-system").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
       
        var bd=$('#DBactual').val();
        var btn=$("#btn-system").val();
        var Systemid=$('#Systemid').val();
        var Systemstatus=$('#Systemstatus').val();
        var Systemdescription=$('#Systemdescription').val();
        var Systemabreviation=$('#Systemabreviation').val();

        var yes=1;
        if(!Systemdescription || !Systemabreviation || !Systemstatus) {
            yes=0;
        } 
    
        if(yes > 0) {

            $("#btn-system").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Systemid":Systemid,"Systemstatus":Systemstatus,"Systemdescription":Systemdescription,"Systemdescription":Systemdescription,"Systemabreviation":Systemabreviation,"bd":bd,"btn":btn},
                url: SITEURL + "/listSystem/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Systemdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearSystem();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+Systemdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });
});

function getClearSystem() {

    $('#Systemid').val('');
    $('#Systemstatus').val('');
    $('#Systemdescription').val('');
    $('#Systemabreviation').val('');
    $("#btn-system").attr("disabled", false);

    // Modal
    $("body").removeAttr("style");
    $('.jquery-modal').fadeOut(500);
    
    var oTable = $('.ListSystemRefres').dataTable();
    oTable.fnDraw(false);
}
