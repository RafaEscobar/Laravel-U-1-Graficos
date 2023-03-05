<div>
    <figure class="highcharts-figure">
        <div id="container"></div>
    
    </figure>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    
    <script>
    
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
        max: 35,
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
            from: 0,
            to: 10,
            color: 'rgba(242, 0, 255, 0.26)',
            thickness: 20
        }, 
        {
            from: 10,
            to: 28,
            color: 'rgba(255, 255, 0, 0.55)', 
            thickness: 20
        }, {
             from: 28,
             to: 35,
             color: 'rgba(255, 0, 0, 0.61)',
             thickness: 20
         }
    ]
    },
    
    series: [{
        name: 'Temperatura',
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
        inc = <?= $temp ?>;
    
        // let newVal = point.y + inc;
        // if (newVal < 0 || newVal > 5) {
        //     newVal = point.y - inc;
        // }
    
        point.update(inc);
    }
    
    }, 3000);
    </script>
</div>