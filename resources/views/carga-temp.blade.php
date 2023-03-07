<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Temperatura y voltaje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="container">
{{-- ==================================================== --}}
    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>
    <div id="loadplace">

    </div>

</body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>

//???????????????????????????????????????????
Highcharts.chart('container', {

    chart: {
        type: 'gauge',
        plotBackgroundColor: null,
        plotBackgroundImage: null,
        plotBorderWidth: 0,
        plotShadow: false,
        height: '40%'
    },

    title: {
        text: 'Temperatura'
    },

    pane: {
        startAngle: -90,
        endAngle: 89.9,
        background: null,
        center: ['50%', '75%'],
        size: '110%'
    },

    // the value axis
    yAxis: {
        min: 0,
        max: 35,
        // tickPixelInterval: 10,
        tickPosition: 'inside',
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
        // tickLength: 5,
        tickWidth: 6,
        minorTickInterval: null,
        labels: {
            distance: 20,
            style: {
                fontSize: '14px'
            }
        },
        plotBands: [{
            from: 0,
            to: 10,
            color: 'rgba(194, 255, 79, 1)', // green
            thickness: 20
        }, 
        {
            from: 10,
            to: 30,
            color: 'rgba(255, 255, 0, 0.61)', // yellow
            thickness: 20
        }, 
        {
             from: 30,
             to: 35,
             color: 'rgba(255, 0, 0, 0.61)', // red
             thickness: 20
         }
    ]
    },

    series: [{
        name: 'Temperatura',
        data: [0],
        tooltip: {
            valueSuffix: ' °'
        },
        dataLabels: {
            format: '{y} °',
            borderWidth: 0,
            color: (
                Highcharts.defaultOptions.title &&
                Highcharts.defaultOptions.title.style &&
                Highcharts.defaultOptions.title.style.color
            ) || '#333333',
            style: {
                fontSize: '16px'
            }
        },
        dial: {
            radius: '100%',
            backgroundColor: 'gray',
            baseWidth: 12,
            baseLength: '0%',
            rearLength: '0%'
        },
        pivot: {
            backgroundColor: 'gray',
            radius: 6
        }

    }]

});

// Add some life
setInterval(() => {
    
const chart = Highcharts.charts[0];
if (chart && !chart.renderer.forExport) {
    const point = chart.series[0].points[0],
    
    // aqui
    inc = <?= $temp ?>;
    console.log(inc);


    point.update(inc);
}

}, 3000);

</script>
{{-- ==================================================== --}}

</html>