$(document).ready(function () {

    agregarFila();

    $('#agregar_fila').click(function () {
        agregarFila();
    });

    $("#eliminar_fila").click(function () {

        let tamaño = $('#contenido-tabla tr').length;
        if (tamaño > 1) {
            $('#contenido-tabla tr:last').remove();
            $('#descuento').val('');
            calcular();
        } else {
            $('.cantidad_inventario').val('');
            $('.producto').val('');
            $('.cantidad').val('');
            $('.precio').val('');
            $('.precio_produ').val('');
            $('.impuesto').val('');
            $('#total').val('');
            $('#descuento').val('');
            calcular();
        }

    });

    function agregarFila() {
        $.ajax({
            url: 'factura/agregarFila',
            method: 'POST',
            data: { obtenerFila: 1 },
            success: function (data) {
                $('#contenido-tabla').append(data);
            }
        });
    }

    $('#contenido-tabla').delegate('.producto', 'change', function () {
        let produ = $(this).val();
        let tr = $(this).parent().parent();

        $.post('inventario/mostrarPrecio', { produ }, function (response) {

            const precio = JSON.parse(response);
            tr.find('.cantidad_inventario').val(precio.cantidad);
            tr.find('.cantidad').val('');
            tr.find('.precio').val(precio.precio);
            tr.find('.precio_produ').val('');
            calcular()
        });
    });


    $('#contenido-tabla').delegate('.cantidad', 'keyup', function () {
        let cantidad = $(this);
        let tr = $(this).parent().parent();

        if ((cantidad.val() - 0) > (tr.find('.cantidad_inventario').val() - 0)) {
            alert('Esa Cantidad no está disponible');
            cantidad.val('');
        } else {

            let subtotal = cantidad.val() * tr.find('.precio').val();

            let campoImpuesto = tr.find('.impuesto').val() * 0.01;

            let impuesto = subtotal * campoImpuesto;

            let total = subtotal + impuesto;

            tr.find('.precio_produ').val(total);
            calcular();

            $('#contenido-tabla').delegate('.impuesto', 'keyup', function () {

                let subtotal = cantidad.val() * tr.find('.precio').val();

                let campoImpuesto = tr.find('.impuesto').val() * 0.01;

                let impuesto = subtotal * campoImpuesto;

                let total = subtotal + impuesto;

                tr.find('.precio_produ').val(total);
                calcular()
            })

        }
    });

    function calcular(){
        let sub_total = 0;
        $('.precio_produ').each(function(){
            sub_total = sub_total + ($(this).val() * 1);
        });

        $('#sub_total').val(sub_total);
    }

    $('#descuento').keyup(function () {
        let subtotal = $('#sub_total').val();
        let desc = $(this).val() * 0.01;
        let descuento = subtotal * desc;

        $('#total').val(subtotal - descuento);
    });

});