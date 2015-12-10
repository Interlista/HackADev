@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Create a Communicable Disease Report
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
                    {!! Form::label('disease_notified','Disease as Notified', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4 ">
                    {!! Form::text('disease_text', null, ['class' => 'form-control ', 'placeholder' => 'Disease Name' ,'required']) !!}
                    </div>
                </div><!--form control-->

                {{--//Date Field--}}
                <div class="form-group">
                    {!! Form::label('date','Notified Date', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                    {!! Form::input('date','disease_date_text',Carbon\Carbon::today()->format('Y/m/d'), ['class' => 'form-control', 'placeholder' => 'Notified Date','required']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                    {!! Form::label('disease_confirmed','Disease Confirmed', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-lg-4">
                    {!! Form::text('disease_confirmed_text', null, ['class' => 'form-control', 'placeholder' => 'Confirmed Disease','required']) !!}
                    </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('date','Confirmed Date', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::input('date','confirmed_date_text',Carbon\Carbon::today()->format('Y/m/d'), ['class' => 'form-control', 'placeholder' => 'Confirmed Date','required']) !!}
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('patient_name','Patient Name', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('patient_name_text', null, ['class' => 'form-control', 'placeholder' => 'Patient Name','required']) !!}
                </div>
                </div><!--form control-->

                {{--TODO: Drop down list for distrcts Task Allocated - Ravindu--}}
                <div class="form-group">
                {!! Form::label('address','Address', ['class' => 'col-sm-2 control-label']) !!}

                <div class="col-lg-4">
                    {!! Form::text('street_no_text', null, ['class' => 'form-control', 'placeholder' => 'Street Number','required']) !!} <br>
                    {!! Form::text('street_name_text', null, ['class' => 'form-control', 'placeholder' => 'Street','required']) !!} <br>
                    {!! Form::text('village_name_text', null, ['class' => 'form-control', 'placeholder' => 'Village','required']) !!} <br>
                    {!! Form::text('town_name_text', null, ['class' => 'form-control', 'placeholder' => 'Town','required']) !!} <br>
                    {{--{!! Form::text('district_name_text', null, ['class' => 'form-control', 'placeholder' => 'district','required']) !!}--}}
                    <select class="form-control" name="district_name_text" id="district_name_text" autocomplete="off" required>
                        <option selected>- Select District -</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Galle">Galle</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Kegalle">Kegalle</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Matara">Matara</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Vavuniya">Vavuniya</option>
                    </select>
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('sex','Sex', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::radio('sex_text', 'Male',true, ['class' => 'control']) !!} Male
                    {!! Form::radio('sex_text', 'Female',false, ['class' => 'control']) !!} Female
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('ethnic_group','Ethnic Group', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::radio('ethnic_group_text', 'Sinhala',true, ['class' => 'control']) !!} Sinhalese
                    {!! Form::radio('ethnic_group_text', 'Tamil',false, ['class' => 'control']) !!} Tamil
                    {!! Form::radio('ethnic_group_text', 'Burger',false, ['class' => 'control']) !!} Burger
                    {!! Form::radio('ethnic_group_text', 'Other',false, ['class' => 'control']) !!} Other
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('date_of_onset','Date of Onset', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::input('date','date_of_onset_text',\Carbon\Carbon::today()->format('Y/m/d'), ['class' => 'form-control', 'placeholder' => 'Date of On Set']) !!}
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('date_of_hospitalization','Date of Hospitalization', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::input('date','date_of_hospitalization_text', \Carbon\Carbon::today()->format('Y/m/d'), ['class' => 'form-control', 'placeholder' => 'Date of Hospitalization']) !!}
                </div>
                </div><!--form control-->

                {{--TODO: This Area Should be a customizable text area - Task Allocated to Ishan--}}
                <div class="form-group">
                {!! Form::label('laboratory_findings','Laboratory Findings', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-6">
                    {!! Form::text('laboratory_findings_text', null, ['class' => 'form-control','id'=>'laboratory_findings_text']) !!}
                </div>
                </div><!--form control-->


                <div class="form-group">
                {!! Form::label('outcomes','Outcomes', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::radio('outcome_text', 'recovered',true, ['class' => 'control']) !!}Recoverd
                    {!! Form::radio('outcome-text', 'died',false, ['class' => 'control']) !!}Died
                </div>
                </div><!--form control-->

                <div class="form-group">
                {!! Form::label('isolated','Where Isolated', ['class' => 'col-sm-2 control-label']) !!}
                <div class="col-lg-10">
                    {!! Form::radio('isolated_place', 'Home',true, ['class' => 'control']) !!}Home
                    {!! Form::radio('isolated_place', 'Hospital',false, ['class' => 'control']) !!}Hospital
                    {!! Form::radio('isolated_place', 'No',false, ['class' => 'control']) !!}No
                </div>
                </div><!--form control-->

                {{--TODO: Should contain multiple text fields to add name/ date/ age/ observation --}}
                <div class="form-group">
                    {!! Form::label('contacts_investigate','Investigated Contacts', ['class' => 'col-sm-2 control-label']) !!} <br>

                    {!! Form::label('patients_household','Patients Household', ['class' => 'col-sm-2 control-label']) !!}
                    <br><br>
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">

                            <div class="row">
                                <div class="col-md-3">
                                    Name
                                </div>
                                <div class="col-md-3">
                                    Date
                                </div>
                                <div class="col-md-3">
                                    Age
                                </div>
                                <div class="col-md-3">
                                    Observation
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::textarea('household_contact_name1',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id'=>'name1'])!!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('date', 'Hdata1', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date1']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('number','household_contact_age1','',['class'=>'form-control','min'=>0,'id'=>'age1']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::textarea('Hobservation1',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation1'])!!}
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::textarea('household_contact_name2',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'name2'])!!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('date', 'Hdata2', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date2']) !!}

                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('number','household_contact_age2','age2',['class'=>'form-control','min'=>0,'id'=>'age2']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::textarea('Hobservation2',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation2'])!!}
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::textarea('household_contact_name3',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name3'])!!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('date', 'Hdata3', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date3']) !!}

                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('number','household_contact_age3','age3',['class'=>'form-control','min'=>0,'id'=>'age3']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::textarea('Hobservation3',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation3'])!!}
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::textarea('household_contact_name4',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name4'])!!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('date', 'Hdata4', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date4']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('number','household_contact_age4','age4',['class'=>'form-control','min'=>0,'id'=>'age4']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::textarea('Hobservation4',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation4'])!!}
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    {!! Form::textarea('household_contact_name5',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name5'])!!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('date', 'Hdata5', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date5']) !!}

                                </div>
                                <div class="col-md-3">
                                    {!! Form::input('number','household_contact_age5','age5',['class'=>'form-control','min'=>0,'id'=>'age5']) !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::textarea('Hobservation5',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation5'])!!}
                                </div>
                            </div>
                            <br>

                        </div>
                        </div>

                        {!! Form::label('other-contacts','Other Contacts', ['class' => 'col-sm-2 control-label']) !!}

                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">

                                <div class="row">
                                    <div class="col-md-3">
                                        Name
                                    </div>
                                    <div class="col-md-3">
                                        Date
                                    </div>
                                    <div class="col-md-3">
                                        Age
                                    </div>
                                    <div class="col-md-3">
                                        Observation
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::textarea('other_contact_name1',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id'=>'name1_contacts'])!!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('date', 'odate1', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date1_contacts']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('number','other_contact_age1','age1_contacts',['class'=>'form-control','min'=>0,'id'=>'age1_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::textarea('Oobservation1',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation1_contacts'])!!}
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::textarea('other_contact_name2',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'name2_contacts'])!!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('date', 'odate2', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date2_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('number','other_contact_age2','age2_contacts',['class'=>'form-control','min'=>0,'id'=>'age2_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::textarea('Oobservation2',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation2_contacts'])!!}
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::textarea('other_contact_name3',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name3_contacts'])!!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('date', 'odate3', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date3_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('number','other_contact_age3','age3_contacts',['class'=>'form-control','min'=>0,'id'=>'age3_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::textarea('Oobservation3',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation3_contacts'])!!}
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::textarea('other_contact_name4',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name4_contacts'])!!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('date', 'odate4', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date4_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::input('number','other_contact_age4','age4_contacts',['class'=>'form-control','min'=>0,'id'=>'age4_contacts']) !!}

                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::textarea('Oobservation4',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation4_contacts'])!!}
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-md-3">
                                        {!! Form::textarea('other_contact_name5',null,['cols'=>'10','rows'=>'1','class'=>'form-control', 'id' => 'name5_contacts'])!!}
                                    </div>
                                    <div class="col-md-3">

                                        {!! Form::input('date', 'odate5', null, ['class' => 'form-control', 'placeholder' => 'Date','id'=>'date5_contacts']) !!}
                                    </div>
                                    <div class="col-md-3">

                                        {!! Form::input('number','other_contact_age5','age5_contacts',['class'=>'form-control','min'=>0,'id'=>'age5_contacts']) !!}
                                    </div>
                                    <div class="col-md-3">
                                        {!! Form::textarea('Oobservation5',null,['cols'=>'10','rows'=>'1','class'=>'form-control','id'=>'observation5_contacts'])!!}
                                    </div>
                                </div>
                                <br>

                            </div>
                        </div>


                    </div><!--form control-->


            <div class="form-group">
                        {!! Form::submit('Record',['class'=>'btn btn-success col-md-2 col-md-offset-1'])!!}
                    </div>

                    {!! Form::close() !!}
        </div><!-- /.box-body -->
    </div><!--box box-success-->

@endsection

<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{--<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>--}}
<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({buttonList : ['fontSize','bold','italic' ,'underline','strikeThrough','subscript','superscript','html']}).panelInstance('laboratory_findings_text');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation1');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation2');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation3');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation4');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation5');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation1_contacts');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation2_contacts');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation3_contacts');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation4_contacts');
        new nicEditor({buttonList : ['fontSize','bold','italic','underline','strikeThrough','subscript','superscript','html']}).panelInstance('observation5_contacts');
    });
</script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>
<script>
    $(function(){
        $('div.alert').delay(5000).fadeOut('slow');
    });

</script>



{{--TODO:: Check for the flaws in the design. Add editable text areas--}}
{{--TODO:: Routes are not added.--}}
{{--TODO:: Add date pickers in the design for date fields--}}
{{--TODO:: Remove the language tab from the whole design--}}
