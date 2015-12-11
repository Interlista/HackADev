
@extends('backend.layouts.master')


@section('page-header')
    <h1>
        Disaster Areas - Map View
        <small>{{ trans('strings.backend.mohoff_title') }}</small>
    </h1>

    <style>
        #gmap {
            width: 600px;
            height: 400px;
            background-color: #CCC;
        }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0VNngrDJcJB5fXjoU40-hspXMamVKb8k"></script>
@endsection

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

            {{--<div id="floating-panel">--}}
                {{--<input id="address" type="textbox" value="Colombo, Sri Lanka">--}}
                {{--<input id="submit" type="button" value="Geocode">--}}
            {{--</div>--}}
            {{--goole map show location --}}
            <div class="row">

                <div  id="gmap" class="col-md-8">

                </div>

                <div id="content_area" class="col-md-4">

                    {!! Form::open(['url' => 'admin/access/insert/location', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                    <div class="form-group">
                        {!! Form::label('location_name','Location', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('location_name', null, ['class' => 'form-control ', 'id' => 'location_name', 'placeholder' => 'Enter the location details here.' ,'required']) !!}
                    </div>
                    </div><!--form control-->

                     <div class="form-group">
                    {!! Form::label('lat_value','Latitude', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('lat', null, ['class' => 'form-control', 'id' => 'lat', 'placeholder' => 'Latitude Value','required']) !!}
                    </div>
                    </div><!--form control-->

                    <div class="form-group">
                    {!! Form::label('lang_value','Longitude', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-lg-8">
                        {!! Form::text('long', null, ['class' => 'form-control', 'id' => 'long', 'placeholder' => 'Longitude Value','required']) !!}
                    </div>
                    </div><!--form control-->

                    <div class="form-group">
                    {!! Form::label('risk_level','Risk', ['class' => 'col-sm-4 control-label']) !!}
                    <div class="col-lg-8">
                        <select class="form-control" name="risk_level" id="risk_level" autocomplete="off" required>
                            <option selected>- Select Risk Level -</option>
                            <option value="1">High</option>
                            <option value="2">Medium</option>
                            <option value="3">Low</option>>
                        </select>
                    </div>
                    </div><!--form control-->

                    <div class="form-group">
                        {!! Form::submit('Record',['class'=>'btn btn-success col-md-3 col-md-offset-5'])!!}
                    </div>
                </div>

            </div>




            </div>



        </div><!-- /.box-body -->
    </div><!--box box-success-->

    {{--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>--}}
    {{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0VNngrDJcJB5fXjoU40-hspXMamVKb8k"></script>--}}

    <script>
        var map;
        function initialize() {
            var myLatlng = new google.maps.LatLng(24.18061975930,79.36565089010);
            var myOptions = {
                zoom:7,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
            // marker refers to a global variable
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map
            });

            google.maps.event.addListener(map, "click", function(event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("lat").value = clickLat.toFixed(4);
                document.getElementById("long").value = clickLon.toFixed(4);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(clickLat,clickLon),
                    map: map
                });
            });
        }

        initialize();
    </script>


@endsection

{{--function initialize() {--}}
{{--var mapCanvas = document.getElementById('map');--}}
{{--var mapOptions = {--}}
{{--center: new google.maps.LatLng(7.873054, 80.771797),--}}
{{--zoom: 8,--}}
{{--mapTypeId: google.maps.MapTypeId.ROADMAP--}}
{{--}--}}
{{--var map = new google.maps.Map(mapCanvas, mapOptions)--}}
{{--}--}}
{{--google.maps.event.addDomListener(window, 'load', initialize);--}}


{{--var geocoder;--}}
{{--//var mapLocationMarkers = [];--}}
{{--//        var map;--}}
{{--//        function initialize() {--}}
{{--//            geocoder = new google.maps.Geocoder();--}}
{{--//            var latlng = new google.maps.LatLng(6.9847222, 81.0563889);--}}
{{--//            var mapOptions = {--}}
{{--//                zoom: 8,--}}
{{--//                center: latlng--}}
{{--//            }--}}
{{--//            map = new google.maps.Map(document.getElementById("map"), mapOptions);--}}
{{--//          getlocationDetails();--}}
{{--//        }--}}
{{--//        function getlocationDetails() {--}}
{{--//--}}
{{--//            var locationtrack = function () {--}}
{{--//               var mapLocationMarkers = [];--}}
{{--//                $.ajax({--}}
{{--//                    'async': false,--}}
{{--//                    'type': "GET",--}}
{{--//                    'global': false,--}}
{{--//                    'dataType': 'json',--}}
{{--//                    url: 'mapLocation',--}}
{{--//                    'success': function (data) {--}}
{{--//--}}
{{--//                        for (index in data) {--}}
{{--//                            // console.log(data);--}}
{{--//                            mapLocationMarkers.push(data[index].village_name_text);--}}
{{--//--}}
{{--//                        }--}}
{{--//--}}
{{--//                    }--}}
{{--//                });--}}
{{--//                markLocations(mapLocationMarkers);--}}
{{--//                return mapLocationMarkers;--}}
{{--//            }();--}}
{{--//--}}
{{--//        }--}}
{{--//--}}
{{--//        function markLocations(locationdata){--}}
{{--//--}}
{{--//            var locations = locationdata;--}}
{{--//--}}
{{--//            var nooflocations = locations.length;--}}
{{--//            for(var i=0;i<!--<nooflocations;-->i++){--}}
{{--//                codeAddress(locations[i]);--}}
{{--//            }--}}
{{--//        }--}}
{{--//        function codeAddress(address) {--}}
{{--//--}}
{{--//            geocoder.geocode( { 'address': address}, function(results, status) {--}}
{{--//                if (status == google.maps.GeocoderStatus.OK) {--}}
{{--//--}}
{{--//                    map.setCenter(results[0].geometry.location);--}}
{{--//                    var marker = new google.maps.Marker({--}}
{{--//                        map: map,--}}
{{--//                        position: results[0].geometry.location--}}
{{--//                    });--}}
{{--//--}}
{{--//                } else {--}}
{{--//                    alert("Geocode was not successful for the following reason: " + status);--}}
{{--//                }--}}
{{--//            });--}}
{{--//        }--}}
{{--//--}}
{{--//--}}
{{--//--}}
{{--//--}}
{{--//        google.maps.event.addDomListener(window, 'load', initialize);--}}