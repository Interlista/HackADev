@extends('backend.layouts.master')

@section('page-header')
    <h1>
        View a Communicable Disease Report
        {{--<small>{{ trans('strings.backend.phioff_title') }}</small>--}}
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
        <div class="box-body">
            {{--Content Goes Here--}}
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Disease as Notified</th>
                        <th>Notified Date</th>
                        <th>Disease Confirmed</th>
                        <th>Confirmed Date</th>
                        <th>Patient Name</th>
                        <th>Street No</th>
                        <th>Street Name</th>
                        <th>Village Name</th>
                        <th>Town Name</th>
                        <th>District</th>
                        <th>Sex</th>
                        <th>Ethnic Group</th>
                        <th>Date Of Onset</th>
                        <th>Date Of Hospitalization</th>
                        <th>Laboratory Findings</th>
                        <th>Outcome</th>
                        <th>Isolated Place</th>
                        @permission('moh_access_management')
                        @permission('view-access-management')
                        <th>Actions</th>
                        @endauth
                        @endauth

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($comdata as $data)
                        <tr>
                            <td>{!! $data->disease_text !!}</td>
                            <td>{!! $data->disease_date_text !!}
                            <td>{!! $data->disease_confirmed_text !!}</td>
                            <td>{!! $data->confirmed_date_text !!}</td>
                            <td>{!! $data->patient_name_text !!}</td>
                            <td>{!! $data->street_no_text !!}</td>
                            <td>{!! $data->street_name_text !!}</td>
                            <td>{!! $data->village_name_text !!}</td>
                            <td>{!! $data->town_name_text !!}</td>
                            <td>{!! $data->district_name_text !!}</td>
                            <td>{!! $data->sex_text !!}</td>
                            <td>{!! $data->ethnic_group_text !!}</td>
                            <td>{!! $data->date_of_onset_text !!}</td>
                            <td>{!! $data->date_of_hospitalization_text !!}</td>
                            <td>{!! $data->laboratory_findings_text !!}</td>
                            <td>{!! $data->outcome_text !!}</td>
                            <td>{!! $data->isolated_place !!}</td>
                            @permission('moh_access_management')
                            @permission('view-access-management')
                            <td>
                                <a  class="btn btn-xs btn-primary fa fa-pencil"  href="{!!route('admin.access.editdata',$data->id)!!}" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                                <a  class="btn btn-xs btn-danger fa fa-trash"  href="{!!route('admin.access.deletereport',$data->id)!!}" data-toggle="tooltip" data-placement="top" title="Delete"></a>
                            </td>
                            @endauth
                            @endauth
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->



    <!-- Modal -->

    <!-- Modal For PHI officer Register-->
    <div id="phidataedit" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Report</h4>
                </div>
                <div class="modal-body asas">

            </div>
        </div>
    </div>

    <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


@endsection


