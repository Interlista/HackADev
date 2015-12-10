@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('labels.register_box_title') }}</div>

				<div class="panel-body">

					{!! Form::open(['to' => 'auth/register', 'class' => 'form-horizontal', 'role' => 'form']) !!}

						<div class="form-group">
							{!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('name', 'name', old('name'), ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
							</div>
						</div>

					<div class="form-group">
						{!! Form::label('nic_number', trans('NIC'), ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
						{!! Form::input('nic_number', 'nic_number', old('nic_number'), ['class' => 'form-control']) !!}
							</div>
					</div>
					{{--conact number--}}
					<div class="form-group">
						{!! Form::label('contact_number', trans('Contact Number'), ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
						{!! Form::input('contact_number', 'contact_number', old('contact_number'), ['class' => 'form-control']) !!}
							</div>
					</div>
					{{--phi_ref--}}
					<div class="form-group">
						{!! Form::label('phi_ref_number', trans('PHI Referance Number'), ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
						{!! Form::input('phi_ref_number', 'phi_ref_number', old('phi_ref_number'), ['class' => 'form-control']) !!}
							</div>
					</div>
					{{--phi_area--}}
					<div class="form-group">
						{!! Form::label('phi_area', trans('PHI Area'), ['class' => 'col-md-4 control-label']) !!}
						{{--{!! Form::input('se', 'name', old('name'), ['class' => 'form-control']) !!}--}}
						<div class="col-md-6">
						<select class="form-control" name="phi_area" id="districtSelect" autocomplete="off">
							<option selected>- Select District -</option>
							<option value="Ampara">Ampara</option>
							<option value="Anuradhapura">Anuradhapura</option>
							<option value="Badulla">Badulla</option>
							<option value="Batticalo">Batticalo</option>
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
					</div>

						<div class="form-group">
							{!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						<div class="form-group">
							{!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
								{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control']) !!}
							</div>
						</div>

						{{--<div class="form-group">--}}
							{{--<div class="col-md-6 col-md-offset-4">--}}
								{{--{!! Form::submit(trans('labels.register_button'), ['class' => 'btn btn-primary']) !!}--}}
							{{--</div>--}}
						{{--</div>--}}

					{!! Form::close() !!}

				</div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection