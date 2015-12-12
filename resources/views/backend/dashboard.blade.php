@extends('backend.layouts.master')

@section('page-header')
    <h1>
        <small>{{ trans('strings.backend.dashboard_title') }}</small>
    </h1>
@endsection
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
    <script type="text/javascript">
        var number;
        window.onload = function () {

            var dps = []; // dataPoints

            var chart = new CanvasJS.Chart("chartContainer",{
                title :{
                    text: "Live Feed From Device-Badulla"
                },
                data: [{
                    type: "line",
                    dataPoints: dps
                }]
            });

            var xVal = 0;
            var yVal = 100;
            var updateInterval =1950;
            var dataLength =30; // number of dataPoints visible at any point

            var updateChart = function (count) {
                count = count || 1;
                // count is number of times loop runs to generate random dataPoints.

               // for (var j = 0; j < count; j++) {
                console.log("ajaxxxx " + number);
                    isSession();
                    var sens=parseInt(number);
                    yVal = sens;

                    dps.push({
                        x: xVal,
                        y: yVal
                    });
                    xVal++;
               // };
                if (dps.length > dataLength)
                {
                    dps.shift();
                }

                chart.render();

            };

            function myFunction(a) {
                number =a;
                console.log("myfun " +number );
               // return number;               // Function returns the product of a and b
            }

            function isSession() {
                console.log("ajax");
                $.ajax({
                    url: "../admin/access/data",
                    type: "get",
                    data: {},
                    success: function (e) {
                        $.each(e, function (e, t) {
                            console.log("dfdsfds " +t.measurment);
                            return myFunction(t.measurment);
                        })
                    },
                    error: function (e) {
                        console.log("error_sub_load!", e.responseJSON)
                    }
                })
            }
            // generates first set of dataPoints
            updateChart(dataLength);

            // update chart after specified time.
            setInterval(function(){updateChart()}, updateInterval);

        }
    </script>
    <script type="text/javascript" src="/assets/script/canvasjs.min.js"></script>
    {!! HTML::script('js/jquery.canvasjs.min.js') !!}

    <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Welcome {!! auth()->user()->name !!}!</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div id="chartContainer" style="height:400px; width:100%;">

        </div><!-- /.box-body -->
    </div><!--box box-success-->



@endsection