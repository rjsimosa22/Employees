$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready( function () {

    $('#ListClient').DataTable({
        processing: false,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listClient",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'name', name: 'name'},
            { data: 'type' },
            { data: 'document' },
            { data: 'phone' },
            { data: 'description' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
    
    var tableClientSearch=$('#ListClientSearch').DataTable({
        processing: false,
        serverSide: false,
        ajax: {
            url: SITEURL + "/listClient",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'idtype', name: 'idtype', 'visible': false},
            { data: 'type' },
            { data: 'document' },
            { data: 'name'},
            { data: 'description'},
        ],
        order: [[0, 'desc']]
        
    });

    // Para resaltar en el listado al cliente seleccionado
    $('#ListClientSearch tbody').on('click', 'tr', function () {
        var table = $('#ListClientSearch').DataTable();
        var data = tableClientSearch.row( this ).data();
        $('#ListClientSearch tr').removeClass('highlighted');
        $(this).addClass('highlighted');

        // modificar
        $('#ClientidNew').val(data['id']);
        $('#Clientname').val(data['name']);
        $('#Clienttype').val(data['idtype']);
        $('#Clientdocument').val(data['document']);
       
        // Registrar
        $('#Clientids').val(data['id']);
        $('#Clientnames').val(data['name']);
        $('#Clienttypes').val(data['idtype']);
        $('#Clientdocuments').val(data['document']);

        // modificar
        $("#searchClient").modal("hide");
        $("#editVehicle").modal("show");
    });

    // Editar cliente
    $('body').on('click', '.edit-client', function () {
        var client = $(this).data("id").split('/');
        var client_id = client[0];
        var client_name = client[1];
      
        $.get('listClient/' + client_id +'/edit', function (data) {

            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-client').val('edit');

            //Register data
            $('#Clientsid').val(data.id);
            $('#Clienttype').val(data.type);
            $('#Clientname').val(data.name);
            $('#Clientphone').val(data.phone);
            $('#Clientemail').val(data.email);
            $('#Clientstatus').val(data.status);
            $('#Clientcontact').val(data.contact);
            $('#Clientaddress').val(data.address);
            $('#Clientaddress').text(data.address);
            $('#Clientdocument').val(data.document);
            $('#Clientbirthdate').val(data.birthdate);
            $('#Clientanniversary').val(data.anniversary);
            $('#Clientobservations').val(data.observations);
            $('#Clientobservations').text(data.observations);
        })
    });

    // Eliminar cliente
    $('body').on('click', '#delete-client', function () {
        var client = $(this).data("id").split('/');
        var client_id = client[0];
        var client_name = client[1];
        
        if(confirm("Está seguro que desea eliminar el registro del CLIENTE: "+client_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listClient/delete/"+client_id,
                success: function (data) {
                    $('#mensSuccess').text('El cliente '+client_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearVehicles(); 
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El cliente '+client_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-client', function () {

        if($("#btn-client").val()=='edit') {

            var action='edit';
            var content='editó';
            var Clientid=$('#Clientsid').val();
            var Clienttype=$('#Clienttype').val();
            var Clientname=$('#Clientname').val();
            var Clientphone=$('#Clientphone').val();
            var Clientemail=$('#Clientemail').val();
            var Clientstatus=$('#Clientstatus').val();
            var Clientcontact=$('#Clientcontact').val();
            var Clientaddress=$('#Clientaddress').val();
            var Clientdocument=$('#Clientdocument').val();
            var Clientbirthdate=$('#Clientbirthdate').val();
            var Clientanniversary=$('#Clientanniversary').val();
            var Clientobservations=$('#Clientobservations').val();

        } else {

            var action='register';
            var content='Registro';
            var Clienttype=$('#Clienttypes').val();
            var Clientname=$('#Clientnames').val();
            var Clientphone=$('#Clientphones').val();
            var Clientemail=$('#Clientemails').val();
            var Clientstatus=$('#Clientstatuss').val();
            var Clientcontact=$('#Clientcontacts').val();
            var Clientaddress=$('#Clientaddresss').val();
            var Clientdocument=$('#Clientdocuments').val();
            var Clientbirthdate=$('#Clientbirthdates').val();
            var Clientanniversary=$('#Clientanniversarys').val();
            var Clientobservations=$('#Clientobservationss').val();
        }

        var yes=1;
        if(!Clientname || !Clienttype || !Clientdocument || !Clientphone) {
            yes=0;
        } 

        if(yes > 0) {

            $("#btn-client").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Clientid":$('#Clientsid').val(),"Clienttype":Clienttype,"Clientname":Clientname,"Clientphone":Clientphone,"Clientemail":Clientemail,"Clientstatus":Clientstatus,"Clientcontact":Clientcontact,"Clientaddress":Clientaddress,"Clientdocument":Clientdocument,"Clientbirthdate":Clientbirthdate,"Clientanniversary":Clientanniversary,"Clientobservations":Clientobservations},
                url: SITEURL + "/listClient/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El cliente '+Clientname.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearClient();
                    getClearClientNew();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El cliente '+Clientname.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });
});

function getClearClient() {

    $('#Clientsid').val('');
    $('#Clientname').val('');
    $('#Clienttype').val('1');
    $('#Clientphone').val('');
    $('#Clientemail').val('');
    $('#Clientstatus').val('1');
    $('#Clientcontact').val('');
    $('#Clientaddress').val('');
    $('#Clientaddress').text('');
    $('#Clientdocument').val('');
    $('#Clientbirthdate').val('');
    $('#Clientanniversary').val('');
    $('#Clientobservations').val('');
    $('#Clientobservations').text('');
    $("#btn-client").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);
    
    var oTable = $('.ListClientRefres').dataTable();
    oTable.fnDraw(false);
}

function getClearClientNew() {
    
    $('#Clientnames').val('');
    $('#Clienttypes').val('1');
    $('#Clientphones').val('');
    $('#Clientemails').val('');
    $('#Clientstatuss').val('1');
    $('#Clientcontacts').val('');
    $('#Clientaddresss').val('');
    $('#Clientaddresss').text('');
    $('#Clientdocuments').val('');
    $('#Clientbirthdates').val('');
    $('#Clientanniversarys').val('');
    $('#Clientobservationss').val('');
    $('#Clientobservationss').text('');
    $("#btn-client").attr("disabled", false);

    var oTable = $('.ListClientRefres').dataTable();
    oTable.fnDraw(false);
}
