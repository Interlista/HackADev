@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Edit a Communicable Disease Report
        <small>{{ trans('strings.backend.phioff_title') }}</small>
    </h1>
@endsection

@section('breadcrumbs')
    <li class="active">{!! link_to_route('admin.access.users.report', trans('menus.phi_view')) !!}</li>
    <li class="active">{{ trans('strings.report') }}</li>
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
            @foreach($edit as $item)
            {!! Form::open(['url' => 'admin/access/report/edit', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                {!! Form::hidden('id', $item->id) !!}

            <div class="form-group">
                {!! Form::label('disease_notified','Disease as Notified', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4 ">
                    {!! Form::text('disease_text',$item->disease_text, ['class' => 'form-control ', 'placeholder' => 'Disease Name' ,'required']) !!}
                </div>
            </div><!--form control-->

            {{--//Date Field--}}
            <div class="form-group">
                {!! Form::label('date','Notified Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('date',$item->disease_date_text, ['class' => 'form-control', 'placeholder' => 'Notified Date','required']) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('disease_confirmed','Disease Confirmed', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('disease_confirmed_text', $item->disease_confirmed_text, ['class' => 'form-control', 'placeholder' => 'Confirmed Disease','required']) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('date','Confirmed Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('date',$item->confirmed_date_text, ['class' => 'form-control', 'placeholder' => 'Confirmed Date','required']) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('patient_name','Patient Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('patient_name_text', $item->patient_name_text, ['class' => 'form-control', 'placeholder' => 'Patient Name','required']) !!}
                </div>
            </div><!--form control-->

            {{--TODO: Drop down list for distrcts Task Allocated - Ravindu--}}
            <div class="form-group">
                {!! Form::label('address','Address', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-lg-4">
                    {!! Form::text('street_no_text', $item->street_no_text, ['class' => 'form-control', 'placeholder' => 'Street Number','required']) !!} <br>
                    {!! Form::text('street_name_text', $item->street_name_text, ['class' => 'form-control', 'placeholder' => 'Street','required']) !!} <br>
                    {!! Form::text('village_name_text', $item->village_name_text, ['class' => 'form-control', 'placeholder' => 'Village','required']) !!} <br>
                    {!! Form::text('town_name_text', $item->town_name_text, ['class' => 'form-control', 'placeholder' => 'Town','required']) !!} <br>
                    {!! Form::text('district_name_text', $item->district_name_text, ['class' => 'form-control', 'placeholder' => 'district','required']) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('sex','Sex', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    <?php $status1 = false ?>
                    <?php $status2 = false ?>
                    @if($item->sex_text=='Male')
                            <?php $status1 = true ?>
                    @endif
                    @if($item->sex_text=='Female')
                        <?php $status2 = true ?>
                    @endif
                     {!! Form::radio('sex_text', 'Male', $status1, ['class' => 'control'])!!} Male
                    {!! Form::radio('sex_text', 'Female',$status2, ['class' => 'control']) !!} Female
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('ethnic_group','Ethnic Group', ['class' => 'col-sm-2 control-label']) !!}
                <?php $Sinhala = false ?>
                <?php $Tamil = false ?>
                <?php $Burger = false ?>
                <?php $Other = false ?>
                @if($item->ethnic_group_text=='Sinhala')
                    <?php $Sinhala = true ?>
                @endif
                @if($item->ethnic_group_text=='Tamil')
                    <?php $Tamil = true ?>
                @endif
                @if($item->ethnic_group_text=='Burger')
                    <?php $Burger = true ?>
                @endif
                @if($item->ethnic_group_text=='Other')
                    <?php $Other = true ?>
                @endif
                <div class="col-lg-10">
                    {!! Form::radio('ethnic_group_text', 'Sinhala',$Sinhala, ['class' => 'control']) !!} Sinhalese
                    {!! Form::radio('ethnic_group_text', 'Tamil',$Tamil, ['class' => 'control']) !!} Tamil
                    {!! Form::radio('ethnic_group_text', 'Burger',$Burger, ['class' => 'control']) !!} Burger
                    {!! Form::radio('ethnic_group_text', 'Other',$Other, ['class' => 'control']) !!} Other
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('date_of_onset','Date of Onset', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('date',$item->date_of_onset_text, ['class' => 'form-control', 'placeholder' => 'Date of On Set']) !!}
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('date_of_hospitalization','Date of Hospitalization', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('date',$item->date_of_hospitalization_text, ['class' => 'form-control', 'placeholder' => 'Date of Hospitalization']) !!}
                </div>
            </div><!--form control-->

            {{--TODO: This Area Should be a customizable text area - Task Allocated to Ishan--}}
            <div class="form-group">
                {!! Form::label('laboratory_findings','Laboratory Findings', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('laboratory_findings_text', $item->laboratory_findings_text, ['class' => 'form-control','id'=>'laboratory_findings_text']) !!}
                </div>
            </div><!--form control-->


            <div class="form-group">
                {!! Form::label('outcomes','Outcomes', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    <?php $recovered = false ?>
                    <?php $died = false ?>
                    @if($item->outcome_text=='recovered')
                        <?php $recovered = true ?>
                    @endif
                    @if($item->outcome_text=='died')
                        <?php $died = true ?>
                    @endif
                    {!! Form::radio('outcome_text', 'recovered',$recovered, ['class' => 'control']) !!}Recoverd
                    {!! Form::radio('outcome-text', 'died',$died, ['class' => 'control']) !!}Died
                </div>
            </div><!--form control-->

            <div class="form-group">
                {!! Form::label('isolated','Where Isolated', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    <?php $Home = false ?>
                    <?php $Hospital = false ?>
                    <?php $No = false ?>
                    @if($item->isolated_place=='Home')
                        <?php $Home = true ?>
                    @endif
                    @if($item->isolated_place=='Hospital')
                        <?php $Hospital = true ?>
                    @endif
                    @if($item->isolated_place=='No')
                        <?php $No = true ?>
                    @endif
                    {!! Form::radio('isolated_place', 'Home',$Home, ['class' => 'control']) !!}Home
                    {!! Form::radio('isolated_place', 'Hospital',$Hospital, ['class' => 'control']) !!}Hospital
                    {!! Form::radio('isolated_place', 'No',$No, ['class' => 'control']) !!}No
                </div>
            </div><!--form control-->

            {{--TODO: Should contain multiple text fields to add name/ date/ age/ observation --}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label('contacts_investigate','Investigated Contacts', ['class' => 'col-sm-2 control-label']) !!} <br>--}}

                {{--{!! Form::label('patients_household','Patients Household', ['class' => 'col-sm-2 control-label']) !!}--}}
                {{--<br><br>--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-offset-1 col-md-10">--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--Name--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Date--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Age--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Observation--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name1',$item->confirmed_date_text,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id'=>'name1'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', $item->confirmed_date_text, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date1']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',$item->confirmed_date_text,'age1',['class'=>'form-control','min'=>0,'id'=>'age1']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation1',$item->confirmed_date_text,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation1'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name2',$item->confirmed_date_text,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'name2'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date2']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age2',['class'=>'form-control','min'=>0,'id'=>'age2']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation2',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation2'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name3',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name3'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date3']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age3',['class'=>'form-control','min'=>0,'id'=>'age3']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation3',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation3'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name4',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name4'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date4']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age4',['class'=>'form-control','min'=>0,'id'=>'age4']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation4',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation4'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name5',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name5'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date5']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age5',['class'=>'form-control','min'=>0,'id'=>'age5']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation5',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation5'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--{!! Form::label('other-contacts','Other Contacts', ['class' => 'col-sm-2 control-label']) !!}--}}

                {{--<div class="row">--}}
                    {{--<div class="col-md-offset-1 col-md-10">--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--Name--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Date--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Age--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--Observation--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name1_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id'=>'name1_contacts'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date1_contacts']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age1_contacts',['class'=>'form-control','min'=>0,'id'=>'age1_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation1_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation1_contacts'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name2_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'name2_contacts'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date2_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age2_contacts',['class'=>'form-control','min'=>0,'id'=>'age2_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation2_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation2_contacts'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name3_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name3_contacts'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date3_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age3_contacts',['class'=>'form-control','min'=>0,'id'=>'age3_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation3_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation3_contacts'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name4_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name4_contacts'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date4_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::input('number',null,'age4_contacts',['class'=>'form-control','min'=>0,'id'=>'age4_contacts']) !!}--}}

                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation4_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation4_contacts'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('name5_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name5_contacts'])!!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}

                                {{--{!! Form::input('date', 'date', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date5_contacts']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}

                                {{--{!! Form::input('number',null,'age5_contacts',['class'=>'form-control','min'=>0,'id'=>'age5_contacts']) !!}--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                                {{--{!! Form::textarea('observation5_contacts',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation5_contacts'])!!}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<br>--}}

                    {{--</div>--}}
                {{--</div>--}}


            {{--</div><!--form control-->--}}


            <div class="form-group">
                {!! Form::submit('Update',['class'=>'btn btn-success col-md-2 col-md-offset-1'])!!}
            </div>

            {!! Form::close() !!}
                @endforeach
        </div><!-- /.box-body -->
    </div><!--box box-success-->



@endsection


