$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listCoins').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listCoins",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'description', name: 'description'},
            { data: 'abreviation' },
            { data: 'symbol' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-coins', function () {
       
        var coins = $(this).data("id").split('/');
        var coins_id = coins[0];
        var coins_name = coins[1];

        $.get('listCoins/' + coins_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-coins').val('edit');
            $('#btn-coins').text('editar');

            // Combo de estatus
            $('#Coinsstatus').val('');
            $('#Coinsstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Coinsstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
           $('#tittleCoins').text('Editar');
           $('#tittleCoinsHr').text('Editar');
           $('#Coinsid').val(data.coins[0]['id']);
           $('#Coinsstatus').val(data.coins[0]['status']);
           $('#Coinssymbol').val(data.coins[0]['symbol']);
           $('#Coinsdescription').val(data.coins[0]['description']);
           $('#Coinsabreviation').val(data.coins[0]['abreviation']);
        })
    });

    $('body').on('click', '.add-coins', function () {
        $('#tittleCoins').text('Registrar');
        $('#tittleCoinsHr').text('Registrar');
        $("#btn-coins").text("Registrar");
        var coins = $(this).data("id");
        $.get('listCoins/' + coins +'/edit', function (data) {
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-coins').val('add');
                
                // Combo de estatus
                $('#Coinsstatus').val('');
                $('#Coinsstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('Coinsstatus')[0];
                             
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#Coinsid').val('');
                $('#Coinssymbol').val('');
                $('#Coinsstatus').val('1');
                $('#Coinsdescription').val('');
                $('#Coinsabreviation').val('');
            }    
        });		
    });

    $('body').on('click', '#delete-coins', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var coins=$(this).data("id").split('/');
        var coins_id=coins[0];
        var coins_name=coins[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+coins_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listCoins/delete/"+coins_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+coins_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearCoins();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+coins_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-coins', function () {
    
        if($("#btn-coins").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
       
        var btn=$("#btn-coins").val();
        var Coinsid=$('#Coinsid').val();
        var Coinssymbol=$('#Coinssymbol').val();
        var Coinsstatus=$('#Coinsstatus').val();
        var Coinsdescription=$('#Coinsdescription').val();
        var Coinsabreviation=$('#Coinsabreviation').val();

        var yes=1;
        if(!Coinsdescription || !Coinsabreviation || !Coinssymbol || !Coinsstatus) {
            yes=0;
        } 
    
        if(yes > 0) {

            $("#btn-coins").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Coinsid":Coinsid,"Coinsstatus":Coinsstatus,"Coinsdescription":Coinsdescription,"Coinsabreviation":Coinsabreviation,"Coinssymbol":Coinssymbol},
                url: SITEURL + "/listCoins/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Coinsdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearCoins();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+Coinsdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearCoins() {

    $('#Coinsid').val('');
    $('#Coinsstatus').val('1');
    $('#Coinsdescription').val('');
    $('#Coinsabreviation').val('');
    $("#btn-coins").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listCoinsRefres').dataTable();
    oTable.fnDraw(false);
}