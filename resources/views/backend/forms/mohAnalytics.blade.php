@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Summary of Dengue Patients
        <small>{{ trans('strings.backend.mohoff_title') }}</small>
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
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{!! auth()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <script>

                 var districtChartData = function(){
                    var tmp = [];
                    $.ajax({
                        'async': false,
                        'type': "GET",
                        'global': false,
                        'dataType': 'json',
                        url:'chartApi',
                        'success': function (data) {
                           // alert('asd');
                            for(table in data){
                                if(data[table].name=='Ampara')
                                   tmp['Ampara'] = data[table].datacount;

                                if(data[table].name=='Anuradhapura')
                                    tmp['Anuradhapura'] = data[table].datacount;

                                if(data[table].name=='Badulla')
                                    tmp['Badulla'] = data[table].datacount;

                                if(data[table].name=='Batticaloa')
                                    tmp['Batticaloa'] = data[table].datacount;

                                if(data[table].name=='Colombo')
                                    tmp['Colombo'] = data[table].datacount;

                                if(data[table].name=='Galle')
                                    tmp['Galle'] = data[table].datacount;

                                if(data[table].name=='Gampaha')
                                    tmp['Gampaha'] = data[table].datacount;

                                if(data[table].name=='Hambantota')
                                    tmp['Hambantota'] = data[table].datacount;

                                if(data[table].name=='Jaffna')
                                    tmp['Jaffna'] = data[table].datacount;

                                if(data[table].name=='Kalutara')
                                    tmp['Kalutara'] = data[table].datacount;

                                if(data[table].name=='Kandy')
                                    tmp['Kandy'] = data[table].datacount;

                                if(data[table].name=='Kegalle')
                                    tmp['Kegalle'] = data[table].datacount;

                                if(data[table].name=='Kurunegala')
                                    tmp['Kurunegala'] = data[table].datacount;

                                if(data[table].name=='Mannar')
                                    tmp['Mannar'] = data[table].datacount;

                                if(data[table].name=='Matara')
                                    tmp['Matara'] = data[table].datacount;

                                if(data[table].name=='Moneragala')
                                    tmp['Moneragala'] = data[table].datacount;

                                if(data[table].name=='Mullaitivu')
                                    tmp['Mullaitivu'] = data[table].datacount;

                                if(data[table].name=='NuwaraEliya')
                                    tmp['NuwaraEliya'] = data[table].datacount;

                                if(data[table].name=='Polonnaruwa')
                                    tmp['Polonnaruwa'] = data[table].datacount;

                                if(data[table].name=='Puttalam')
                                    tmp['Puttalam'] = data[table].datacount;

                                if(data[table].name=='Ratnapura')
                                    tmp['Ratnapura'] = data[table].datacount;

                                if(data[table].name=='Trincomalee')
                                    tmp['Trincomalee'] = data[table].datacount;

                                if(data[table].name=='Vavuniya')
                                    tmp['Vavuniya'] = data[table].datacount;

                            }
                        }
                    });
                    return tmp;
                }();
            </script>
            <div id="chart" style="height: 400px;"></div>

            <script>


                Morris.Bar({
                    element: 'chart',

                    data: [
                        { district: 'Ampara', value: districtChartData['Ampara'] },
                        { district: 'Anuradhapura', value: districtChartData['Anuradhapura'] },
                        { district: 'Badulla', value: districtChartData['Badulla'] },
                        { district: 'Batticaloa', value: districtChartData['Batticaloa'] },
                        { district: 'Colombo', value:districtChartData['Colombo']},
                        { district: 'Galle', value:districtChartData['Galle'] },
                        { district: 'Gampaha', value: districtChartData['Gampaha'] },
                        { district: 'Hambantota', value: districtChartData['Hambantota'] },
                        { district: 'Jaffna', value: districtChartData['Jaffna'] },
                        { district: 'Kalutara', value:districtChartData['Kalutara'] },
                        { district: 'Kandy', value: districtChartData['Kandy'] },
                        { district: 'Kegalle', value: districtChartData['Kegalle'] },
                        { district: 'Kurunegala', value: districtChartData['Kurunegala'] },
                        { district: 'Mannar', value: districtChartData['Mannar'] },
                        { district: 'Matara', value: districtChartData['Matara'] },
                        { district: 'Moneragala', value: districtChartData['Moneragala'] },
                        { district: 'Mullaitivu', value: districtChartData['Mullaitivu'] },
                        { district: 'Nuwara Eliya', value: districtChartData['NuwaraEliya'] },
                        { district: 'Polonnaruwa', value: districtChartData['Polonnaruwa'] },
                        { district: 'Puttalam', value: districtChartData['Puttalam'] },
                        { district: 'Ratnapura', value: districtChartData['Ratnapura'] },
                        { district: 'Trincomalee', value: districtChartData['Trincomalee'] },
                        { district: 'Vavuniya', value: districtChartData['Vavuniya'] },
                    ],
                    xkey: 'district',
                    ykeys: ['value'],
                    labels: ['Patients'],
                    xLabelAngle: 60
                });
            </script>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection