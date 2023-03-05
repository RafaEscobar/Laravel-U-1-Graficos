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

    <figure class="highcharts-figure">
        <div id="container"></div>
    </figure>


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
        text: 'Voltaje'
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
        max: 5,
        tickPixelInterval: 5,
        tickPosition: 'inside',
        tickColor: Highcharts.defaultOptions.chart.backgroundColor || '#FFFFFF',
        tickLength: 5,
        tickWidth: 4,
        minorTickInterval: null,
        labels: {
            distance: 20,
            style: {
                fontSize: '14px'
            }
        },
        plotBands: [{
            from: 1,
            to: 5,
            color: 'rgba(0, 0, 255, 0.56)', // green
            thickness: 20
        }, 
        {
            from: 0,
            to: 1,
            color: 'rgba(230, 230, 53, 0.42)', // yellow
            thickness: 20
        }, 
        //{
        //     from: 35,
        //     to: 50,
        //     color: '#DF5353', // red
        //     thickness: 20
        // }
    ]
    },

    series: [{
        name: 'Voltaje',
        data: [0],
        tooltip: {
            valueSuffix: ' V'
        },
        dataLabels: {
            format: '{y} V',
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
    inc = <?= $voltaje ?>;
    console.log(inc);
    // let newVal = point.y + inc;
    // if (newVal < 0 || newVal > 5) {
    //     newVal = point.y - inc;
    // }
    

    point.update(inc);
}

}, 3000);

</script>


</html>