@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Patient Details Entered
        <small>{{ trans('strings.backend.phioff_title') }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li><a href="{!!route('backend.dashboard')!!}"><i class="fa fa-dashboard"></i> {{ trans('menus.dashboard') }}</a></li>
    <li class="active">{{ trans('strings.here') }}</li>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{!! auth()->user()->name !!}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Disease as Notified</th>
                        <th>Notified Date</th>
                        <th>Disease Confirmed</th>
                        <th>Confirmed Date</th>
                        <th>District</th>
                        <th>Sex</th>
                    </tr>
                    </thead>

                    <tbody>

                    <tr>
                        <td></td>
                    </tr>

                    </tbody>
                </table>
            </div>

        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection
