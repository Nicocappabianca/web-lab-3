// Populate, filter, order and empty table
$(document).ready(function(){   
    $('#btn-load').click(function(){
        loadData(); 
    })

    $('#btn-empty').click(function(){
        $('#table-body').empty();  
        $('#qty').val('');
        $('#order_by').val('');
        $('#input-code').val('');
        $('#input-type').val('');
        $('#input-measure').val('');
        $('#input-description').val('');
        $('#input-date').val('');
    })
});

function loadData(orden = 'stock'){
    $('#table-body').empty(); 
    $('#table-body').append('<h3 style="color: #0773BD; text-align: center; padding-top: 40px;">Cargando datos...</h3>');
    $.ajax({
        type: 'POST', 
        url: './get_products.php', 
        data: {
            order: orden,
            productCode: $('#input-code').val(),
            productType: $('#input-type').val(),
            productMeasure: $('#input-measure').val(),
            productDescription: $('#input-description').val(),
            productDate: $('#input-date').val(), 
        },
        success: function(res, status){
            $('#table-body').empty(); 
            $('#qty').empty('');
            $('#order_by').val(''); 
            var prodsObject = JSON.parse(res);
            
            if(prodsObject.qty < 1){
                $('#table-body').html('<h2 style="color: #253ECD; text-align: center; padding-top: 40px;">Su búsqueda no arrojo resultados.</h2>'); 
            } 
            
            var newProducts = '';

            prodsObject.products.forEach(element => {
                newProducts += '<tr>' +
                    '<td>' + element.code + '</td>' +
                    '<td>' + element.type + '</td>' +
                    '<td>' + element.measure + '</td>' +
                    '<td>' + element.description + '</td>' +
                    '<td>' + element.date + '</td>' +
                    '<td>' + element.stock + '</td>' +
                    '<td style="width: 5%;"><img onClick="updateProduct('+element.code+');" src="./img/update.png" alt="Modificar"></td>' +
                    '<td style="width: 5%;"><img onClick="deleteProduct('+element.code+');" src="./img/delete.png" alt="Eliminar"></td>' +
                '</tr>'; 
            });

            $('#table-body').append(newProducts);
            $('#qty').val(prodsObject.qty); 
            $('#order_by').val(orden); 
        }, 
        error: function(res, status) {
            $('#table-body').empty();
            $('#order_by').empty(); 
            $('#table-body').append('<h2 style="color: #DF2E25; text-align: center; padding-top: 40px;">(Error 404) No fue posible cargar los datos.</h2>');
        },
    }); 
}

// Open/Close modal create
$(document).ready(function(){
    $('#btn-open').click(function(){
        $('#btn-update').hide();
        $('#btn-create').show(); 
        loadTypes(); 
        $('#form-container').show(); 
        $('#table-section').addClass('disabled'); 
        var today = new Date().toISOString().substr(0, 10);
        $('#date-form').val(today);
        $('#btn-create').prop('disabled', true);  
    });
    
    $('#btn-close').click(function(){
        $('#form-container').hide(); 
        $('#table-section').removeClass('disabled'); 
        $('#product-form').trigger('reset'); 
        $('#btn-update').prop('disabled', true);
        $('#btn-create').prop('disabled', true);  
    })
}); 

// Load options for select 
function loadTypes(){
    $('#product-types').empty();
    $('#product-types').html('<option>Cargando...</option>');
    $('#product-types').prop('disabled', true); 
    $.ajax({
        type: 'POST', 
        url: './get_types.php', 
        success: function(res, status){
            var typesObject = JSON.parse(res);
            var options = ''; 

            typesObject.types.forEach(element => {
                options += '<option value="'+element.type+'">'+ element.type +'</option>'; 
            });

            $('#product-types').empty();
            $('#product-types').append(options); 
            $('#product-types').prop('disabled', false); 
        }, 
        error: function(res, status) {
            $('#product-types').empty();
            $('#product-types').append('<option>Error</option>');
        },
    }); 
}

// Create product
$('#btn-create').click(function(){
    $('#btn-create').prop('disabled', true); 
    $('#btn-close').prop('disabled', true); 
    $('#btn-create').empty(); 
    $('#btn-create').html('Enviando...'); 
    var form = document.getElementById('product-form');
    if(form.checkValidity()){
        var data = $('#product-form').serialize(); 
        $.ajax({
            type:'POST', 
            url: './create_product.php', 
            data, 
            success: function(res, status){ 
                $('#btn-create').empty(); 
                $('#btn-create').html('Enviar');
                $('#product-form').trigger('reset'); 
                $('#btn-close').prop('disabled', false);
                alert('producto cargado correctamente!');
                $('#form-container').hide(); 
                $('#table-section').removeClass('disabled');
                $('#btn-create').prop('disabled', true);
                loadData();  
            }, 
            error: function(res, status) {
                $('#btn-create').empty(); 
                $('#btn-create').html('Enviar');
                $('#product-form').trigger('reset');
                $('#btn-close').prop('disabled', false);
                alert('Error! No fue posible cargar el producto.'); 
                $('#form-container').hide(); 
                $('#table-section').removeClass('disabled');
                $('#btn-create').prop('disabled', true); 
                loadData();
            },
        });
    } else{
        alert('Por favor, complete todos los datos antes de enviar.'); 
    }
}); 

// Delete product
function deleteProduct(id = null){
    if(id){
        if(confirm('Desea eliminar el producto con código ' +id+ ' ?')){
            $.ajax({
                type:'POST', 
                url: './delete_product.php', 
                data: {id: id}, 
                success: function(res, status){ 
                    alert('Producto eliminado correctamente.');
                    $('#qty').val('');
                    $('#order_by').val('');
                    $('#input-code').val('');
                    $('#input-type').val('');
                    $('#input-measure').val('');
                    $('#input-description').val('');
                    $('#input-date').val('');  
                    loadData(); 
                }, 
                error: function(res, status) {
                    alert('Error! No fue posible eliminar el producto.');
                    $('#qty').val('');
                    $('#order_by').val('');
                    $('#input-code').val('');
                    $('#input-type').val('');
                    $('#input-measure').val('');
                    $('#input-description').val('');
                    $('#input-date').val('');
                    loadData();
                },
            });
        }
    }
}

// Load update form
function updateProduct(id = null){
    if(id){
        $('#btn-create').hide();
        $('#btn-update').show();
        $.ajax({
            type:'GET', 
            url: './get_product_by_id.php', 
            data: {id: id}, 
            success: function(res){ 
                var product = JSON.parse(res);
                loadTypes(); 
                $('#form-container').show(); 
                $('#table-section').addClass('disabled'); 
                var today = new Date().toISOString().substr(0, 10);
                $('#date-form').val(today);
                $('#code-form').val(product.code);
                $('#original-code').val(product.code);
                $('#description-form').val(product.description);
                $('#stock-form').val(product.stock); 
                $('#measure-form').val(product.measure); 
            }, 
            error: function() {
                alert('Error! No es posible cargar el producto.');
                $('#qty').val('');
                $('#order_by').val('');
                $('#input-code').val('');
                $('#input-type').val('');
                $('#input-measure').val('');
                $('#input-description').val('');
                $('#input-date').val('');
                loadData();
            },
        });
    }
}

// Update product
$('#btn-update').click(function(){
    $('#btn-update').prop('disabled', true); 
    $('#btn-close').prop('disabled', true); 
    $('#btn-update').empty(); 
    $('#btn-update').html('Actualizando...'); 
    var form = document.getElementById('product-form');
    if(form.checkValidity()){ 
        var data = $('#product-form').serialize(); 
        $.ajax({
            type:'POST', 
            url: './update_product.php', 
            data, 
            success: function(res, status){ 
                $('#btn-update').empty(); 
                $('#btn-update').html('Actualizar');
                $('#product-form').trigger('reset');
                $('#btn-close').prop('disabled', false);
                alert('producto actualizado con éxito!');
                $('#form-container').hide(); 
                $('#table-section').removeClass('disabled');
                $('#qty').val('');
                $('#order_by').val('');
                $('#input-code').val('');
                $('#input-type').val('');
                $('#input-measure').val('');
                $('#input-description').val('');
                $('#input-date').val('');
                $('#btn-update').prop('disabled', true);
                loadData();  
            }, 
            error: function(res, status) {
                $('#btn-update').empty(); 
                $('#btn-update').html('Actualizar');
                $('#product-form').trigger('reset')
                $('#btn-close').prop('disabled', false);
                alert('Error! No fue posible actualizar el producto.'); 
                $('#form-container').hide(); 
                $('#table-section').removeClass('disabled'); 
                $('#qty').val('');
                $('#order_by').val('');
                $('#input-code').val('');
                $('#input-type').val('');
                $('#input-measure').val('');
                $('#input-description').val('');
                $('#input-date').val('');
                $('#btn-update').prop('disabled', true);
                loadData();
            },
        });
    }else{
        alert('Por favor, complete todos los datos antes de enviar.'); 
    }
}); 

//Disable - Enable send button 
$(document).ready(function(){
    $("#product-form input[type=text]").on('keyup', function(){ 
        if( document.getElementById('code-form').checkValidity() &&
            document.getElementById('description-form').checkValidity() &&
            document.getElementById('measure-form').checkValidity() &&
            document.getElementById('stock-form').checkValidity()   ){
            
            $('#btn-create').prop('disabled', false);
            $('#btn-update').prop('disabled', false);
        }else{
            $('#btn-create').prop('disabled', true);
            $('#btn-update').prop('disabled', true);
        } 
    });

    $("#product-form input[type=number]").on('keyup', function(){ 
        if( document.getElementById('code-form').checkValidity() &&
            document.getElementById('description-form').checkValidity() &&
            document.getElementById('measure-form').checkValidity() &&
            document.getElementById('stock-form').checkValidity() ){
            
            $('#btn-create').prop('disabled', false);
            $('#btn-update').prop('disabled', false);
        }else{
            $('#btn-create').prop('disabled', true);
            $('#btn-update').prop('disabled', true);
        } 
    });

    $("#product-types").bind("change keyup", function(){
        if( document.getElementById('code-form').checkValidity() &&
        document.getElementById('description-form').checkValidity() &&
        document.getElementById('measure-form').checkValidity() &&
        document.getElementById('stock-form').checkValidity() ){
        
            $('#btn-create').prop('disabled', false);
            $('#btn-update').prop('disabled', false);
        }else{
            $('#btn-create').prop('disabled', true);
            $('#btn-update').prop('disabled', true);
        } 
    });
}); 