$(document).ready(function () {

    // TABLA DE FACTURA

    $('#tablaF').DataTable({
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
            { "orderable": true, "className": 'reorder', "targets": 0 },
            { "orderable": true, "className": 'reorder', "targets": 2 },
            { "orderable": false, "targets": '_all' }
        ]
    });

    // TABLA DE LOS CLIENTES

    $('#tablaC').DataTable({
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
            { "orderable": true, "className": 'reorder', "targets": 0 },
            { "orderable": false, "targets": '_all' }
        ]
    });

    // TABLA DE PROVEEDORES

    
    $('#tablaPr').DataTable({
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
            { "orderable": true, "className": 'reorder', "targets": 0 },
            { "orderable": false, "targets": '_all' }
        ]
    });

    // TABLA DE EMPLEADOS
    $('#tablaE').DataTable({
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
            { "orderable": true, "className": 'reorder', "targets": 0 },
            { "orderable": false, "targets": '_all' }
        ]
    });

    // TABLA DE GASTOS

    $('#tablaG').DataTable({
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
            { "orderable": true, "className": 'reorder', "targets": 0 },
            { "orderable": false, "targets": '_all' }
        ]
    });
});