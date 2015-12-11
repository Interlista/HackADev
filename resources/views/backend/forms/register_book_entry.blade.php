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
            {!! Form::open(['url' => 'admin/access/insert/contacts', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                <div class="form-group">
                    {!! Form::label('','Service Name', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4 ">
                    {!! Form::text('contact_name', null, ['class' => 'form-control ', 'id' => 'contact_name', 'placeholder' => 'Enter the name of the service.' ,'required']) !!}
                    </div>
                </div><!--form control-->

                {{--//Date Field--}}
                <div class="form-group">
                    {!! Form::label('date','Disaster Type', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                        <select class="form-control" name="disaster_id" id="disaster_id" autocomplete="off" required>
                            <option selected>- Select Risk Level -</option>
                            <option value="1">Landslides</option>
                            <option value="2">Floods</option>
                            <option value="3">Fire</option>>
                        </select>
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('contact_number','Contact Number', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                    {!! Form::text('contact_number', null, ['class' => 'form-control', 'id' => 'contact_number', 'placeholder' => 'Enter the contact number.','required']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('address','Address', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                        {!! Form::text('address', null, ['class' => 'form-control', 'id'=>'address', 'placeholder' => 'Enter the address.','required']) !!}
                    </div>
                </div>

                <div class="form-group">
                {!! Form::label('other_data','Other Data', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('other_data', null, ['class' => 'form-control', 'id'=>'other_data', 'placeholder' => 'Enter other data here.','required']) !!}
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
