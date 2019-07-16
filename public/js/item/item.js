$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listItemss').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listItems",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'items'},
            { data: 'description'},
            { data: 'abreviation' },
            { data: 'symbol' },
            { data: 'price' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-items', function () {
       
        var item = $(this).data("id").split('/');
        var item_id = item[0];
        var item_name = item[1];

        $.get('listItems/' + item_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-items').val('edit');
            $('#btn-items').text('editar');

            // Combo de rubros
            $('#Itemsidrubro').val('');
            $('#Itemsidrubro').empty();
            var types_items=data.types_items;
            var select=document.getElementsByName('Itemsidrubro')[0];
            
            for (value in types_items) {
                var option=document.createElement("option");
                    option.value=types_items[value]['id'];
                    option.text=types_items[value]['description'];
                    select.add(option);
            }
            
            // Combo de moneda
            $('#Itemsidcoins').val('');
            $('#Itemsidcoins').empty();
            var coins=data.coins;
            var select=document.getElementsByName('Itemsidcoins')[0];
            
            for (value in coins) {
                var option=document.createElement("option");
                    option.value=coins[value]['id'];
                    option.text=coins[value]['symbol'];
                    select.add(option);
            }

            // Combo de estatus
            $('#Itemsstatus').val('');
            $('#Itemsstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('Itemsstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
           $('#tittleItems').text('Editar');
           $('#tittleItemsHr').text('Editar');
           $('#Itemsid').val(data.items[0]['id']);
           $('#Itemsprice').val(data.items[0]['price']);
           $('#Itemsstatus').val(data.items[0]['status']);
           $('#Itemsidcoins').val(data.items[0]['id_coins']);
           $('#Itemsidrubro').val(data.items[0]['id_types_items']);
           $('#Itemsdescription').val(data.items[0]['description']);
           $('#Itemsabreviation').val(data.items[0]['abreviation']);
        })
    });

    $('body').on('click', '.add-items', function () {
        $('#contentDanger').hide();
        $('#contentSuccess').hide();
        $('#btn-items').val('Registrar');
        $('#btn-items').text('Registrar');
    
        $.post(SITEURL + "/add",function(data){
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-itmems').val('add');
                
                // Combo de rubros
                $('#Itemsidrubro').val('');
                $('#Itemsidrubro').empty();
                var types_items=data.types_items;
                var select=document.getElementsByName('Itemsidrubro')[0];
                
                for (value in types_items) {
                    var option=document.createElement("option");
                        option.value=types_items[value]['id'];
                        option.text=types_items[value]['description'];
                        select.add(option);
                }
                
                // Combo de moneda
                $('#Itemsidcoins').val('');
                $('#Itemsidcoins').empty();
                var coins=data.coins;
                var select=document.getElementsByName('Itemsidcoins')[0];
                
                for (value in coins) {
                    var option=document.createElement("option");
                        option.value=coins[value]['id'];
                        option.text=coins[value]['symbol'];
                        select.add(option);
                }

                // Combo de estatus
                $('#Itemsstatus').val('');
                $('#Itemsstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('Itemsstatus')[0];
                
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#Itemsid').val('');
                $('#Itemsprice').val('');
                $('#Itemsstatus').val('1');
                $('#Itemsidcoins').val('1');
                $('#Itemsidrubro').val('1');
                $('#Itemsdescription').val('');
                $('#Itemsabreviation').val('');
                $('#tittleItems').text('Registrar');
                $('#tittleItemsHr').text('Registrar');
            }    
        });		
    });

    $('body').on('click', '#delete-items', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var Items=$(this).data("id").split('/');
        var Items_id=Items[0];
        var Items_name=Items[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+Items_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listItems/delete/"+Items_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Items_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearItems();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+Items_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-items', function () {
    
        if($("#btn-items").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
        
        var btn=$("#btn-items").val();
        var Itemsid=$('#Itemsid').val();
        var Itemsprice=$('#Itemsprice').val();
        var Itemsstatus=$('#Itemsstatus').val();
        var Itemsidcoins=$('#Itemsidcoins').val();
        var Itemsidrubro=$('#Itemsidrubro').val();
        var Itemsdescription=$('#Itemsdescription').val();
        var Itemsabreviation=$('#Itemsabreviation').val();

        var yes=1;
        if(!Itemsidrubro || !Itemsdescription || !Itemsabreviation || !Itemsidcoins || !Itemsstatus || !Itemsprice) {
            yes=0;
        } 

        if(yes > 0) {

            $("#btn-subproduct").attr("disabled", true);

            $.ajax({
                data:{"action":action,"Itemsid":Itemsid,"Itemsprice":Itemsprice,"Itemsstatus":Itemsstatus,"Itemsidcoins":Itemsidcoins,"Itemsidrubro":Itemsidrubro,"Itemsdescription":Itemsdescription,"Itemsabreviation":Itemsabreviation},
                url: SITEURL + "/listItems/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+Itemsdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearItems();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+Itemsdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearItems() {

    $('#Itemsid').val('');
    $('#Itemsprice').val('');
    $('#Itemsstatus').val('1');
    $('#Itemsidcoins').val('1');
    $('#Itemsidrubro').val('1');
    $('#Itemsdescription').val('');
    $('#Itemsabreviation').val('');
    $("#btn-items").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listItemssRefres').dataTable();
    oTable.fnDraw(false);
}