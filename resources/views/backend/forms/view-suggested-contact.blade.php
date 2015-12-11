@extends('backend.layouts.master')

@section('page-header')
    <h1>
        New Disaster Contact Entry
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
        <div class="box-body">
            {!! Form::open(['url' => 'admin/access/PHI/Insert', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                <div class="form-group">
                    {!! Form::label('disease_notified','Service Name', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4 ">
                    {!! Form::text('disease_text', null, ['class' => 'form-control ', 'placeholder' => 'Disease Name' ,'required']) !!}
                    </div>
                </div><!--form control-->

                {{--//Date Field--}}
                <div class="form-group">
                    {!! Form::label('date','Disaster Type', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                    {!! Form::input('date','disease_date_text',Carbon\Carbon::today()->format('Y/m/d'), ['class' => 'form-control', 'placeholder' => 'Notified Date','required']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('disease_confirmed','Contact Number', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                    {!! Form::text('disease_confirmed_text', null, ['class' => 'form-control', 'placeholder' => 'Confirmed Disease','required']) !!}
                    </div>
                </div><!--form control-->


                {{--TODO: Drop down list for distrcts Task Allocated - Ravindu--}}
                <div class="form-group">
                {!! Form::label('address','Address', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                        {!! Form::textarea('disease_confirmed_text', null, ['class' => 'form-control', 'placeholder' => 'Confirmed Disease','required']) !!}
                    </div>

                   </div>

            <div class="form-group">
                        {!! Form::submit('Record',['class'=>'btn btn-success col-md-2 col-md-offset-1'])!!}
                    </div>

                    {!! Form::close() !!}
        </div><!-- /.box-body -->
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
