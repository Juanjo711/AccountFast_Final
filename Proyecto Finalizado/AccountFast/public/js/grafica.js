$(document).ready(mostrarGrafica(2020));

function mostrarGrafica(año) {
    $.ajax({
        type: 'POST',
        url: 'inicio/datosGrafica',
        data: 'año=' + año,
        success: function (data) {
            // console.log(data);
            let valores = JSON.parse(data);

            let e = valores[0],
                f = valores[1],
                m = valores[2],
                a = valores[3],
                ma = valores[4],
                j = valores[5],
                jl = valores[6],
                ag = valores[7],
                s = valores[8],
                o = valores[9],
                n = valores[10],
                d = valores[11],
                // GASTOS
                ge = valores[12],
                gf = valores[13],
                gm = valores[14],
                ga = valores[15],
                gma = valores[16],
                gj = valores[17],
                gjl = valores[18],
                gag = valores[19],
                gs = valores[20],
                go = valores[21],
                gn = valores[22],
                gd = valores[23];


            let ctx = $('#grafico');
            let myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    datasets: [{
                        label: 'Ventas',
                        data: [e, f, m, a, ma, j, jl, ag, s, o, n, d],
                        backgroundColor: '#212121'
                    },{
                        label: 'Gastos',
                        data: [ge, gf, gm, ga, gma, gj, gjl, gag, gs, go, gn, gd],
                        backgroundColor: 'gray'
                    }]
                }
            });

            $('#año').on('change', function () {
                myChart.destroy();
                let año = $('#año').val();
                mostrarGrafica(año);
            });

        }
    })
}

