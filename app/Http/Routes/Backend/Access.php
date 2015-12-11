<?php

use App\Models\Access\Permission\PermissionDependency;
use Illuminate\Support\Facades\Input;

$router->group([
	'prefix' => 'access',
	'namespace' => 'Access',
	'middleware' => 'access.routeNeedsPermission:view-backend'
], function() use ($router)
{
	/**
	 * User Management
	 */
	$router->group(['namespace' => 'User'], function() use ($router) {
		resource('users', 'UserController', ['except' => ['show']]);

		get('data',function(){
			$job = DB::select("select value from disaster_data ORDER by id DESC limit 1");

			return Response::json($job);
		});
		//PHI Roots
		get('PHI/CommunicableDiseaseRegistration', 'UserController@PhiDate');
		//get('PHI/ViewSummary', 'UserController@PhiView');
		post('PHI/Insert', 'UserController@phiInsert');


		//disaster map
		get('add-map', 'UserController@addmap');


		//MOH Root
		//get('mohDashboard','UserController@mohIndex');
		//get('analytics' , 'UserController@mohAnalytics');
		//get('patientDetail','UserController@mohPatientDetailsView');

		//Add location details
		post('insert/location', 'UserController@insertLocation');

		//Add Book Entry
		get('new-contact','UserController@newcontact');

		//common to PHI & MOH
		//get('report','UserController@mohreport')->name('admin.access.users.report');
		//get('report/editData/{id}','UserController@mohreportEditData')->name('admin.access.editdata');
		//post('report/edit','UserController@mohreportEdit');
		//get('report/delete/{id}','UserController@mohreportDelete')->name('admin.access.deletereport');


		get('chartApi', function(){

            $stats = DB::table('communicable_diseases')
				     ->select(DB::raw('district_name_text as name,count(*) as datacount'))
				     ->groupBy('name')
				     ->get();

            return response()->json($stats);

		});
		get('mapLocation','UserController@mohMap');



		get('users/deactivated', 'UserController@deactivated')->name('admin.access.users.deactivated');
		get('users/banned', 'UserController@banned')->name('admin.access.users.banned');
		get('users/deleted', 'UserController@deleted')->name('admin.access.users.deleted');
		get('account/confirm/resend/{user_id}', 'UserController@resendConfirmationEmail')->name('admin.account.confirm.resend');

		/**
		 * Specific User
		 */
		$router->group(['prefix' => 'user/{id}', 'where' => ['id' => '[0-9]+']], function () {
			get('delete', 'UserController@delete')->name('admin.access.user.delete-permanently');
			get('restore', 'UserController@restore')->name('admin.access.user.restore');
			get('mark/{status}', 'UserController@mark')->name('admin.access.user.mark')->where(['status' => '[0,1,2]']);
			get('password/change', 'UserController@changePassword')->name('admin.access.user.change-password');
			post('password/change', 'UserController@updatePassword')->name('admin.access.user.change-password');
		});
	});

	/**
	 * Role Management
	 */
	$router->group(['namespace' => 'Role'], function() use ($router) {
		resource('roles', 'RoleController', ['except' => ['show']]);
	});

	/**
	 * Permission Management
	 */
	$router->group(['prefix' => 'roles', 'namespace' => 'Permission'], function() use ($router)
	{
		resource('permission-group', 'PermissionGroupController', ['except' => ['index', 'show']]);
		resource('permissions', 'PermissionController', ['except' => ['show']]);

		$router->group(['prefix' => 'groups'], function () {
			post('update-sort', 'PermissionGroupController@updateSort')->name('admin.access.roles.groups.update-sort');
		});
	});
});