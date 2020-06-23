$(document).ready(function () {

    mostrarProductos();
    // Se inicia la variable edit en false
    let edit = false;
    // Captura los valores de los inputs cuando se envia el formulario
    $('#form-inventory').submit(function (e) {
        const postData = {
            id: $('#id').val(),
            nombre: $('#nombre').val(),
            precio: $('#precio').val(),
            cantidad: $('#cantidad').val(),
            imagen: $('#imagen').val().split('\\').pop(),
            proveedor: $('#proveedor').val(),
            categoria: $('#categoria').val()
        };

        let url = edit === false ? 'inventario/registrarProducto' : 'inventario/editarProducto';
        // se envian los datos por ajax
        $.post(url, postData, function (response) {
            if (response != 'El ID de producto ya existe.'){
                
                $('#form-inventory').trigger('reset');
                mostrarProductos();
                edit = false;
            }else{
                alert(response);
            }
        });
        // evita que se recargue la pagina
        e.preventDefault();
    });

    // Confirma el eliminar de un producto
    $(document).on('click', '.delete-producto', function () {
        if (confirm('Esta seguro que desea eliminar este producto?')) {
            let producto = $(this)[0];
            let id = $(producto).attr('idprodu');

            // se envia el id del producto por ajax
            $.post('inventario/eliminarProducto', { id }, function (response) {
                if (response == 'Producto eliminado'){
                    mostrarProductos();
                }else{
                    alert(response);
                }
                
            });
        }
    });

    // Muestra los datos del producto que se desea editar
    $(document).on('click', '.edit-producto', function () {
        let producto = $(this)[0];
        let id = $(producto).attr('idprodu');

        // Se envian los datos por ajax
        $.post('inventario/mostrarProducto', { id }, function (response) {
            const producto = JSON.parse(response);

            // Se llena el formulario con la respuesta del ajac
            $('#id').val(producto.id).prop('readonly', true);
            $('#nombre').val(producto.nombre);
            $('#precio').val(producto.precio);
            $('#cantidad').val(producto.cantidad);
            $('#imagen').html(producto.imagen);
            $('#proveedor').val(producto.proveedor);
            $('#categoria').val(producto.categoria);
            // el valor de edit cambia a true
            edit = true;
        });
    });

    // libreria DataTables para mostrar los productos
    function mostrarProductos() {

        $('#id').prop('readonly', false);

        $('#tablaP').DataTable({
            "destroy": true,
            "bAutoWidth": false,
            "ajax": {
                "url": "inventario/mostrarProductos",
                "dataSrc": ""
            },
            "columns": [
                { "data": "id" },
                { "data": "imagen" },
                { "data": "nombre" },
                { "data": "precio" },
                { "data": "cantidad" },
                { "data": "categoria" },
                { "data": "proveedor" },
                { "data": "editar" },
                { "data": "eliminar" }
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página.",
                "search": "Buscar",
                "zeroRecords": "Lo sentimos. No se encontraron registros.",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros aún.",
                "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                "LoadingRecords": "Cargando ...",
                "Processing": "Procesando...",
                "SearchPlaceholder": "Comience a teclear...",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                }
            },
            "columnDefs": [
                { "width": "1px", "targets": 4 },
                { "width": "20px", "targets": 0 },
                { "orderable": false, "className": 'reorder', "targets": 1 },
                { "orderable": false, "className": 'reorder', "targets": 7 },
                { "orderable": false, "className": 'reorder', "targets": 8 },
                { "orderable": true, "targets": '_all' }
            ],
            "pageLength": 5,
            "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, 'Todos']]
        });

    }

});

