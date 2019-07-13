$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listUser').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listUser",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'name', name: 'name'},
            { data: 'email' },
            { data: 'description' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-user', function () {
       
        var user = $(this).data("id").split('/');
        var user_id = user[0];
        var user_name = user[1];

        $.get('listUser/' + user_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-user').val('edit');

            // Combo de perfiles
            $('#Userprofile').val('');
            $('#Userprofile').empty();
            var privileges=data.privileges;
            var select=document.getElementsByName('Userprofile')[0];

            for (value in privileges) {
                var option=document.createElement("option");
                    option.value=privileges[value]['id'];
                    option.text=privileges[value]['description'];
                    select.add(option);
            }

            // Combo de estatus
            $('#Userstatus').val('');
            $('#Userstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Userstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
            $('#Userid').val(data.user['id']);
            $('#Username').val(data.user['name']);
            $('#Useruser').val(data.user['email']);
            $('#Userstatus').val(data.user['status']);
            $('#UserpasswordAct').val(data.user['password']);
            $('#Userprofile').val(data.user['id_privileges']);

            //Register data
            $('#UseridView').val(data.user['id']);
            $('#UsernameView').val(data.user['name']);
            $('#UseruserView').val(data.user['email']);
            $('#UserstatusView').val(data.user['status']);
            $('#UserpasswordActView').val(data.user['password']);
            $('#UserprofileView').val(data.user['id_privileges']);
        })
    });

    $('body').on('click', '#delete-user', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var user = $(this).data("id").split('/');
        var user_id = user[0];
        var user_name = user[1];
      
        if(confirm("Está seguro que desea eliminar el usuario con el NOMBRE: "+user_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listUser/delete/"+user_id,
                success: function (data) {
                    $('#mensSuccess').text('El usuario con el nombre '+user_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearUsers();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El usuario con el nombre '+user_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-user', function () {
     
        if($("#btn-user").val()=='edit') {

            var action='edit';
            var content='editó';
            var Userid=$("#Userid").val();
            var Username=$("#Username").val();
            var Useruser=$("#Useruser").val();
            var Userstatus=$("#Userstatus").val();
            var Userprofile=$("#Userprofile").val();
            var Userpassword=$("#Userpassword").val();
            var Userpassword2=$("#Userpassword2").val();

            var yes=1;
            if(!Username || !Useruser || !Userprofile || !Userstatus) {
                yes=0;
            }

            if(Userpassword) {
                if(Userpassword!=Userpassword2) {
                    alert('confirmación de la Contraseña no coincide con la Contraseña !');return;
                }
            } else {
                var Userpassword=$("#UserpasswordAct").val();
            }

        } else {
            
            var action='register';
            var content='Registro';
            var Userid=$("#Userids").val();
            var Username=$("#Usernames").val();
            var Useruser=$("#Userusers").val();
            var Userstatus=$("#Userstatuss").val();
            var Userprofile=$("#Userprofiles").val();
            var Userpassword=$("#Userpasswords").val();
            var Userpassword2=$("#Userpassword2s").val();

            var yes=1;
            if(!Username || !Useruser || !Userprofile || !Userpassword || !Userstatus) {
                yes=0;
            }

            if(Userpassword!=Userpassword2) {
                alert('confirmación de la Contraseña no coincide con la Contraseña !');return;
            }
        }
        
        if(yes > 0) {

            $("#btn-user").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Userid":Userid,"Username":Username,"Useruser":Useruser,"Userprofile":Userprofile,"Userpassword":Userpassword,"Userstatus":Userstatus},
                url: SITEURL + "/listUser/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El usuario con el nombre '+Username.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearUsers();
                    getClearUsersNew();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El usuario con el nombre '+Username.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }  
    });   
});

function getClearUsers() {

    $("#Userid").val('');
    $("#Username").val('');
    $("#Useruser").val('');
    $("#Userstatus").val(1);
    $("#Userprofile").val(1);
    $("#Userpassword").val('');
    $("#Userpassword2").val('');
    $('#UserpasswordAct').val('');
    $('.jquery-modal').fadeOut(500);
    $("#btn-user").attr("disabled", false);

    $("body").removeAttr("style");
    var oTable = $('.listUserRefres').dataTable();
    oTable.fnDraw(false);
}

function getClearUsersNew() {

    $("#Userids").val('');
    $("#Usernames").val('');
    $("#Userusers").val('');
    $("#Userstatuss").val(1);
    $("#Userprofiles").val(1);
    $("#Userpasswords").val('');
    $("#Userpassword2s").val('');
    $("#btn-user").attr("disabled", false);

    $("body").removeAttr("style");
    var oTable = $('.listUserRefres').dataTable();
    oTable.fnDraw(false);
}