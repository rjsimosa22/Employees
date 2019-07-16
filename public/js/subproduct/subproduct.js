$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function () {

    $('#listSubProductss').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: SITEURL + "/listSubProducts",
            type: 'GET',
        },

        columns: [
            { data: 'id', name: 'id', 'visible': false},
            { data: 'products'},
            { data: 'description'},
            { data: 'abreviation' },
            { data: 'status' },
            { data: 'action' },
        ],
        order: [[0, 'desc']]
    });
        
    $('body').on('click', '.edit-subproduct', function () {
       
        var subproduct = $(this).data("id").split('/');
        var subproduct_id = subproduct[0];
        var subproduct_name = subproduct[1];

        $.get('listSubProducts/' + subproduct_id +'/edit', function (data) {
            
            $('#contentDanger').hide();
            $('#contentSuccess').hide();
            $('#btn-subproduct').val('edit');
            $('#btn-subproduct').text('editar');

            // Combo de productos
            $('#SubProductidproduct').val('');
            $('#SubProductidproduct').empty();
            var product=data.products;
            var select=document.getElementsByName('SubProductidproduct')[0];
            
            for (value in product) {
                var option=document.createElement("option");
                    option.value=product[value]['id'];
                    option.text=product[value]['description'];
                    select.add(option);
            }

            // Combo de estatus
            $('#SubProductstatus').val('');
            $('#SubProductstatus').empty();
            var status=data.status;
            var select=document.getElementsByName('SubProductstatus')[0];
            
            for (value in status) {
                var option=document.createElement("option");
                    option.value=status[value]['id'];
                    option.text=status[value]['description'];
                    select.add(option);
            }

           //Register data
           $('#tittleSubProduct').text('Editar');
           $('#tittleSubProductHr').text('Editar');
           $('#SubProductid').val(data.subproducts[0]['id']);
           $('#SubProductstatus').val(data.subproducts[0]['status']);
           $('#SubProductidproduct').val(data.subproducts[0]['id_product']);
           $('#SubProductdescription').val(data.subproducts[0]['description']);
           $('#SubProductabreviation').val(data.subproducts[0]['abreviation']);
        })
    });

    $('body').on('click', '.add-subproduct', function () {
        $('#contentDanger').hide();
        $('#contentSuccess').hide();
        $('#btn-subproduct').val('Registrar');
        $('#btn-subproduct').text('Registrar');
    
        $.post(SITEURL + "/add",function(data){
                
            if(data.status.length > 0) {
                $('#contentDanger').hide();
                $('#contentSuccess').hide();
                $('#btn-advisors').val('add');
                
                // Combo de productos
                $('#SubProductidproduct').val('');
                $('#SubProductidproduct').empty();
                var product=data.products;
                var select=document.getElementsByName('SubProductidproduct')[0];
                
                for (value in product) {
                    var option=document.createElement("option");
                        option.value=product[value]['id'];
                        option.text=product[value]['description'];
                        select.add(option);
                }

                // Combo de estatus
                $('#SubProductstatus').val('');
                $('#SubProductstatus').empty();
                var status=data.status;
                var select=document.getElementsByName('SubProductstatus')[0];
                
                for (value in status) {
                    var option=document.createElement("option");
                        option.value=status[value]['id'];
                        option.text=status[value]['description'];
                        select.add(option);
                }
                
                //Register data
                $('#SubProductid').val('');
                $('#SubProductstatus').val('1');
                $('#SubProductidproduct').val('1');
                $('#SubProductdescription').val('');
                $('#SubProductabreviation').val('');
                $('#tittleSubProduct').text('Registrar');
                $('#tittleSubProductHr').text('Registrar');
            }    
        });		
    });

    $('body').on('click', '#delete-subproduct', function () {

        $('#contentDanger').hide();
        $('#contentSuccess').hide();

        var SubProduct=$(this).data("id").split('/');
        var SubProduct_id=SubProduct[0];
        var SubProduct_name=SubProduct[1];
      
        if(confirm("Está seguro que desea eliminar el registro: "+SubProduct_name.toUpperCase()+" !")) {
            $.ajax({
                type: "get",
                url: SITEURL + "/listSubProducts/delete/"+SubProduct_id,
                success: function (data) {
                    $('#mensSuccess').text('El registro '+SubProduct_name.toUpperCase()+' se eliminó correctamente...');
                    $('#contentSuccess').show();
                    getClearSubProduct();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensDanger').text('El registro '+SubProduct_name.toUpperCase()+' no se ha podido eliminar, intentelo nuevamente...');
                    $('#contentDanger').show();
                }
            });
        }    
    });
    
    $('body').on('click', '#btn-subproduct', function () {
    
        if($("#btn-subproduct").val()=='edit') {
            var action='edit';
            var content='editó';
        } else {
            var action='register';
            var content='Registro';
        } 
       
        var btn=$("#btn-subproduct").val();
        var SubProductid=$('#SubProductid').val();
        var SubProductstatus=$('#SubProductstatus').val();
        var SubProductidproduct=$('#SubProductidproduct').val();
        var SubProductdescription=$('#SubProductdescription').val();
        var SubProductabreviation=$('#SubProductabreviation').val();
      
        var yes=1;
        if(!SubProductidproduct || !SubProductstatus || !SubProductdescription || !SubProductabreviation) {
            yes=0;
        } 

        if(yes > 0) {

            $("#btn-subproduct").attr("disabled", true);

            $.ajax({
                data:{"action":action,"SubProductid":SubProductid,"SubProductstatus":SubProductstatus,"SubProductabreviation":SubProductabreviation,"SubProductdescription":SubProductdescription,"SubProductidproduct":SubProductidproduct},
                url: SITEURL + "/listSubProducts/store",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#mensSuccess').text('El registro '+SubProductdescription.toUpperCase()+' se '+content+' correctamente...');
                    $('#contentSuccess').show();
                    getClearSubProduct();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#mensSuccess').text('El registro '+SubProductdescription.toUpperCase()+' no se ha podido '+content+', intentelo nuevamente...');
                    $('#contentSuccess').show();
                }
            });
        }    
    });  
});

function getClearSubProduct() {

    $('#SubProductid').val('');
    $('#SubProductstatus').val('1');
    $('#SubProductidproduct').val('1');
    $('#SubProductdescription').val('');
    $('#SubProductabreviation').val('');
    $("#btn-subproduct").attr("disabled", false);
    $('.jquery-modal').fadeOut(500);

    $("body").removeAttr("style");
    var oTable = $('.listSubProductsRefres').dataTable();
    oTable.fnDraw(false);
}