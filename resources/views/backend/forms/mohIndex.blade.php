
@extends('backend.layouts.master')


@section('page-header')
    <h1>
        Dengue Infected Areas - Map View
        <small>{{ trans('strings.backend.mohoff_title') }}</small>
    </h1>
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
            <div id="map">
                <marker  position="kandy"  ></marker>
            </div>



        </div><!-- /.box-body -->
    </div><!--box box-success-->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0VNngrDJcJB5fXjoU40-hspXMamVKb8k"></script>

    <script>
        var mapLocationMarkers = [];

    </script>
    <script>
        var geocoder;
        var map;
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var mapOptions = {
                zoom: 8,
                center: latlng
            }
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
          getlocationDetails();
        }
        function getlocationDetails() {

            var locationtrack = function () {
               var mapLocationMarkers = [];
                $.ajax({
                    'async': false,
                    'type': "GET",
                    'global': false,
                    'dataType': 'json',
                    url: 'mapLocation',
                    'success': function (data) {

                        for (index in data) {
                            // console.log(data);
                            mapLocationMarkers.push(data[index].village_name_text);

                        }

                    }
                });
                markLocations(mapLocationMarkers);
                return mapLocationMarkers;
            }();

        }

        function markLocations(locationdata){

            var locations = locationdata;

            var nooflocations = locations.length;
            for(var i=0;i<nooflocations;i++){
                codeAddress(locations[i]);
            }
        }
        function codeAddress(address) {

            geocoder.geocode( { 'address': address}, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {

                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });

                } else {
                    alert("Geocode was not successful for the following reason: " + status);
                }
            });
        }




        google.maps.event.addDomListener(window, 'load', initialize);
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