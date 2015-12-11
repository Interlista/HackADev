@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Check Suggested Maps from Users
        <small>{{ trans('strings.backend.phioff_title') }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')

    @if(Session::has('message'))
        <div id="alertb" class="alert alert-success">{{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
    @endif

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{!! auth()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->


        <style>

            .info-block
            {
                border-right:5px solid #E6E6E6;margin-bottom:25px
            }
            .info-block .square-box
            {
                width:100px;min-height:110px;margin-right:22px;text-align:center!important;padding:20px 0
            }
            .info-block.block-info
            {
                border-color:#20819e
            }
            .info-block.block-info .square-box
            {
                background-color:#20819e;color:#FFF
            }
            span.hidden {
                visibility: hidden;
            }


            <!-- Table Customizations -->

            .custab{
                border: 1px solid #ccc;
                padding: 5px;
                margin: 5% 0;
                box-shadow: 3px 3px 2px #ccc;
                transition: 0.5s;
            }
            .custab:hover{
                box-shadow: 3px 3px 0px transparent;
                transition: 0.5s;
            }

            
        </style>


        <script>
            $(function() {
                $('#input-search').on('keyup', function() {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.searchable-container .items').hide();
                    $('.searchable-container .items').filter(function() {
                        return rex.test($(this).text());
                    }).show();
                });
            });
        </script>


        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">



                            <center><h2>InstaFlix</h2></center>
                            <div class="">
                                <input type="search" class="form-control" id="input-search" placeholder="Search here..." >
                            </div>
                            <br>
                            <br>
                            <br>

                            <div class="searchable-container">

                                <table class="table table-striped custab">

                                    <thead>
                                    <a href="#" class="btn btn-primary btn-xs pull-right"><b>+</b>  </a>
                                    <tr>
                                        <th>ID</th>
                                        <th>Contact Name</th>
                                        <th>Disaster Type</th>
                                        <th>Contact No</th>
                                        <th>Address</th>
                                        <th>Other Info</th>

                                    </tr>
                                    </thead>

                                // add foreach here
                                <div class="items col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
                                    <div class="info-block block-info clearfix">




                                            <tr>
                                                <td>2</td>
                                                <td>Products</td>
                                                <td>Main Products</td>
                                                <td>Products</td>
                                                <td>Main Products</td>
                                                <td>Products</td>
                                                <td>Main Products</td>
                                                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Approve</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
                                            </tr>



                                    </div>
                                </div>
                                    // end foreach here

                                </table>

                            </div>


            </div>
        </div>


    </div><!--box box-success-->

@endsection

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>--}}




{{--TODO:: Check for the flaws in the design. Add editable text areas--}}
{{--TODO:: Routes are not added.--}}
{{--TODO:: Add date pickers in the design for date fields--}}
{{--TODO:: Remove the language tab from the whole design--}}
