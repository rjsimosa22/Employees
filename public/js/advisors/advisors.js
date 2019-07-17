$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listAdvisors').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listAdvisors",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'description', name: 'description'},
            { data: 'abreviation' },
            { data: 'mobile' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-advisors', function () {
       
        var advisors = $(this).data("id").split('/');
        var advisors_id = advisors[0];
        var advisors_name = advisors[1];
        $.get('listAdvisors/' + advisors_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-advisors').val('edit');
            $('#btn-advisors').val('Editar');

            // Combo de estatus
            $('#Advisorsstatus').val('');
            $('#Advisorsstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Advisorsstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
           $('#tittleAdvisors').text('Editar');
           $('#tittleAdvisorsHr').text('Editar');
           $('#Advisorsid').val(data.advisors[0]['id']);
           $('#Advisorsstatus').val(data.advisors[0]['status']);
           $('#Advisorsmobile').val(data.advisors[0]['mobile']);
           $('#Advisorsdescription').val(data.advisors[0]['description']);
           $('#Advisorsabreviation').val(data.advisors[0]['abreviation']);
        })
    });

    $('body').on('click', '.add-advisors', function () {
        $('#tittleAdvisors').text('Registrar');
        $('#tittleAdvisorsHr').text('Registrar');
        $("#btn-advisors").text("Registrar");
        var advisors = $(this).data("id");
        $.get('listAdvisors/' + advisors +'/edit', function (data) {
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-advisors').val('add');
                
                // Combo de estatus
                $('#Advisorsstatus').val('');
                $('#Advisorsstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('Advisorsstatus')[0];
                             
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#Advisorsid').val('');
                $('#Advisorsmobile').val('');
                $('#Advisorsstatus').val('1');
                $('#Advisorsdescription').val('');
                $('#Advisorsabreviation').val('');
            }    
        });		
    });

    $('body').on('click', '#delete-advisors', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var Advisors=$(this).data("id").split('/');
        var Advisors_id=Advisors[0];
        var Advisors_name=Advisors[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+Advisors_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listAdvisors/delete/"+Advisors_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Advisors_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearAdvisors();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+Advisors_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-advisors', function () {
    
        if($("#btn-advisors").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
       
        var btn=$("#btn-advisors").val();
        var Advisorsid=$('#Advisorsid').val();
        var Advisorsmobile=$('#Advisorsmobile').val();
        var Advisorsstatus=$('#Advisorsstatus').val();
        var Advisorsdescription=$('#Advisorsdescription').val();
        var Advisorsabreviation=$('#Advisorsabreviation').val();

        var yes=1;
        if(!Advisorsdescription || !Advisorsabreviation || !Advisorsmobile || !Advisorsstatus) {
            yes=0;
        } 
    
        if(yes > 0) {

            $("#btn-advisors").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Advisorsid":Advisorsid,"Advisorsstatus":Advisorsstatus,"Advisorsdescription":Advisorsdescription,"Advisorsabreviation":Advisorsabreviation,"Advisorsmobile":Advisorsmobile},
                url: SITEURL + "/listAdvisors/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Advisorsdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearAdvisors();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+Advisorsdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearAdvisors() {

    $('#Advisorsid').val('');
    $('#Advisorsmobile').val('');
    $('#Advisorsstatus').val('1');
    $('#Advisorsdescription').val('');
    $('#Advisorsabreviation').val('');
    $("#btn-advisors").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listAdvisorsRefres').dataTable();
    oTable.fnDraw(false);
}