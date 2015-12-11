$(function () {

 
    /**** Real Time Chart: HighStock ****/
    $('#realtime-chart').highcharts('StockChart', {
        chart : {
            height:300,
            backgroundColor: 'transparent',
            events : {
                load : function () {
                    // set up the updating of the chart each second
                    var series = this.series[0];
                    setInterval(function ()
                    {
                        var x = (new Date()).getTime(), // current time
                            y = Math.round(Math.random() * 100);
                        series.addPoint([x, y], true, true);
                    }, 1000);
                }
            }
        },
        credits: {
          enabled: false
        },
        exporting: {
            enabled: false
        },
        scrollbar: {
          enabled: false
        },
        colors:['rgba(49, 157, 181,0.5)'],
        xAxis: {
            lineColor:'#e1e1e1',
            tickColor:'#EFEFEF'
        },
        yAxis: {
            gridLineColor:'#e1e1e1'
        },
        navigator: {
          outlineColor: '#E4E4E4'
        },
        rangeSelector: {
            buttons: [{
                count: 1,
                type: 'minute',
                text: '1M'
            }, {
                count: 5,
                type: 'minute',
                text: '5M'
            }, {
                type: 'all',
                text: 'All'
            }],
            inputEnabled: false,
            selected: 0
        },
        exporting: {
            enabled: false
        },
        series : [{
            name : 'Real Time Data',
            data : (function ()
            {
                // generate an array of random data
                var data = [], time = (new Date()).getTime(), i;


                for (i = -100; i <= 0; i += 1) {
                    data.push([
                        time + i * 1000,
                        Math.round(Math.random() * 100)
                    ]);
                }
                return data;
            }())
        }]
    });

    
    




});






