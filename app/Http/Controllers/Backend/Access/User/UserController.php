<?php namespace App\Http\Controllers\Backend\Access\User;

use App\communicable_disease;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Access\User\InsertPhiRequest;
use App\Repositories\Backend\User\UserContract;
use App\Repositories\Backend\Role\RoleRepositoryContract;
use App\Repositories\Frontend\Auth\AuthenticationContract;
use App\Http\Requests\Backend\Access\User\CreateUserRequest;
use App\Http\Requests\Backend\Access\User\StoreUserRequest;
use App\Http\Requests\Backend\Access\User\EditUserRequest;
use App\Http\Requests\Backend\Access\User\MarkUserRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserRequest;
use App\Http\Requests\Backend\Access\User\DeleteUserRequest;
use App\Http\Requests\Backend\Access\User\RestoreUserRequest;
use App\Http\Requests\Backend\Access\User\ChangeUserPasswordRequest;
use App\Http\Requests\Backend\Access\User\UpdateUserPasswordRequest;
use App\Repositories\Backend\Permission\PermissionRepositoryContract;
use App\Http\Requests\Backend\Access\User\PermanentlyDeleteUserRequest;
use App\Http\Requests\Backend\Access\User\ResendConfirmationEmailRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;

/**
 * Class UserController
 */
class UserController extends Controller {

	/**
	 * @var UserContract
	 */
	protected $users;

	/**
	 * @var RoleRepositoryContract
	 */
	protected $roles;

	/**
	 * @var PermissionRepositoryContract
	 */
	protected $permissions;

	/**
	 * @param UserContract $users
	 * @param RoleRepositoryContract $roles
	 * @param PermissionRepositoryContract $permissions
	 */
	public function __construct(UserContract $users, RoleRepositoryContract $roles, PermissionRepositoryContract $permissions) {
		$this->users = $users;
		$this->roles = $roles;
		$this->permissions = $permissions;
	}

	/**
	 * @return mixed
	 */
	public function index() {
		return view('backend.access.index')
			->withUsers($this->users->getUsersPaginated(config('access.users.default_per_page'), 1));
	}

	//PHI Functions
	public function PhiDate()
	{
		return view('backend.forms.phidata');
	}

	public function newcontact()
	{
		return view('backend.forms.register_book_entry');
	}

//	public function PhiView()
//	{
//		return view ('backend.forms.phidataList');
//	}
	
    public function phiInsert(InsertPhiRequest $request)
	{
		$data = Input::all();

		$id = DB::table('communicable_diseases')->insertGetId(
			[
				'disease_text'       		=>$data['disease_text'],
				'disease_date_text'  		=>$data['disease_date_text'],
				'disease_confirmed_text'    =>$data['disease_confirmed_text'],
				'confirmed_date_text'    	=>$data['confirmed_date_text'],
				'patient_name_text'     	=>$data['patient_name_text'],
				'street_no_text'  			=>$data['street_no_text'],
				'street_name_text'          =>$data['street_name_text'],
				'village_name_text'       	=>$data['village_name_text'],
				'district_name_text'       	=>$data['district_name_text'],
				'sex_text'       			=>$data['sex_text'],
				'ethnic_group_text'       	=>$data['ethnic_group_text'],
				'date_of_onset_text'       	=>$data['date_of_onset_text'],
				'date_of_hospitalization_text'  =>$data['date_of_hospitalization_text'],
				'laboratory_findings_text'      =>$data['laboratory_findings_text'],
				'outcome_text'       			=>$data['outcome_text'],
				'isolated_place'       			=>$data['isolated_place'],
				'created_at'        			=>Carbon::now(),
			]);
		if($data['household_contact_name1']!=null){
		DB::table('household_contacts')->insert(
			[
				'disease_id'          => $id,
				'Hdate'				  =>$data['Hdata1'],
				'household_contact_name' => $data['household_contact_name1'],
				'household_contact_age'  => $data['household_contact_age1'],
				'Hobservation'  		 => $data['Hobservation1'],
				'created_at'             => Carbon::now(),
			]
		);
		}
		if($data['household_contact_name2']!=null) {
			DB::table('household_contacts')->insert(
				[
					'disease_id' => $id,
					'Hdate' => $data['Hdata2'],
					'household_contact_name' => $data['household_contact_name2'],
					'household_contact_age' => $data['household_contact_age2'],
					'Hobservation' => $data['Hobservation2'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['household_contact_name3']!=null) {
			DB::table('household_contacts')->insert(
				[
					'disease_id' => $id,
					'Hdate' => $data['Hdata3'],
					'household_contact_name' => $data['household_contact_name3'],
					'household_contact_age' => $data['household_contact_age3'],
					'Hobservation' => $data['Hobservation3'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['household_contact_name4']!=null) {
			DB::table('household_contacts')->insert(
				[
					'disease_id' => $id,
					'Hdate' => $data['Hdata4'],
					'household_contact_name' => $data['household_contact_name4'],
					'household_contact_age' => $data['household_contact_age4'],
					'Hobservation' => $data['Hobservation4'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['household_contact_name5']!=null) {
			DB::table('household_contacts')->insert(
				[
					'disease_id' => $id,
					'Hdate' => $data['Hdata5'],
					'household_contact_name' => $data['household_contact_name5'],
					'household_contact_age' => $data['household_contact_age5'],
					'Hobservation' => $data['Hobservation5'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['other_contact_name1']!=null) {
			DB::table('other_contacts')->insert(
				[
					'disease_id' => $id,
					'other_contact_name' => $data['other_contact_name1'],
					'odate' => $data['odate1'],
					'other_contact_age' => $data['other_contact_age1'],
					'Oobservation' => $data['Oobservation1'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['other_contact_name2']!=null) {
			DB::table('other_contacts')->insert(
				[
					'disease_id' => $id,
					'other_contact_name' => $data['other_contact_name2'],
					'odate' => $data['odate2'],
					'other_contact_age' => $data['other_contact_age2'],
					'Oobservation' => $data['Oobservation2'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['other_contact_name3']!=null) {
			DB::table('other_contacts')->insert(
				[
					'disease_id' => $id,
					'other_contact_name' => $data['other_contact_name3'],
					'odate' => $data['odate3'],
					'other_contact_age' => $data['other_contact_age3'],
					'Oobservation' => $data['Oobservation3'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['other_contact_name4']!=null) {
			DB::table('other_contacts')->insert(
				[
					'disease_id' => $id,
					'other_contact_name' => $data['other_contact_name4'],
					'odate' => $data['odate4'],
					'other_contact_age' => $data['other_contact_age4'],
					'Oobservation' => $data['Oobservation4'],
					'created_at' => Carbon::now(),
				]
			);
		}
		if($data['other_contact_name5']!=null) {
			DB::table('other_contacts')->insert(
				[
					'disease_id' => $id,
					'other_contact_name' => $data['other_contact_name5'],
					'odate' => $data['odate5'],
					'other_contact_age' => $data['other_contact_age5'],
					'Oobservation' => $data['Oobservation5'],
					'created_at' => Carbon::now(),
				]
			);
		}
		return Redirect::back()->with('message','Save Successful !');
	}
	//MOH Functions
	public function mohIndex()
	{
		$state = DB::table('communicable_diseases')
			->select('village_name_text')
			->get();

//		return response()->json($state);
		return view ('backend.forms.mohIndex')->with('village',$state);
	}

	public function mohAnalytics()
	{
		return view ('backend.forms.mohAnalytics');
	}

	public function mohPatientDetailsView()
	{
		return view ('backend.forms.mohPatientDetailsView');
	}

	public function mohreport()
	{
		$data=communicable_disease::get();
		return view ('backend.forms.phidataView')->with('comdata',$data);
	}

	public function mohreportEditData($id)
	{
		$Data=DB::select("SELECT *
						  FROM communicable_diseases
						  WHERE communicable_diseases.id=$id");

		return view ('backend.forms.reportedit')->with('edit',$Data);
//		return view('backend.forms.reportedit',['edit'=>$Data,'subsdata1'=>$subsdata]);
	}
	
	public function mohreportEdit(InsertPhiRequest $request)
	{
		$task = communicable_disease::findOrFail(Input::get('id'));
		$input = $request->all();
		$task->fill($input)->save();
		return $this->mohreport()->with('message', 'Data has been Updates.');
	}

	public function mohreportDelete($id)
	{
		communicable_disease::destroy($id);
		return Redirect::back()->with('message', 'Data has been deleted.');
	}



	/**
	 * @param CreateUserRequest $request
	 * @return mixed
     */
	public function create(CreateUserRequest $request) {
		return view('backend.access.create')
			->withRoles($this->roles->getAllRoles('sort', 'asc', true))
			->withPermissions($this->permissions->getAllPermissions());
	}

	/**
	 * @param StoreUserRequest $request
	 * @return mixed
     */
	public function store(StoreUserRequest $request) {
		$this->users->create(
			$request->except('assignees_roles', 'permission_user'),
			$request->only('assignees_roles'),
			$request->only('permission_user')
		);
		return redirect()->route('admin.access.users.index')->withFlashSuccess(trans("alerts.users.created"));
	}

	/**
	 * @param $id
	 * @param EditUserRequest $request
	 * @return mixed
     */
	public function edit($id, EditUserRequest $request) {
		$user = $this->users->findOrThrowException($id, true);
		return view('backend.access.edit')
			->withUser($user)
			->withUserRoles($user->roles->lists('id')->all())
			->withRoles($this->roles->getAllRoles('sort', 'asc', true))
			->withUserPermissions($user->permissions->lists('id')->all())
			->withPermissions($this->permissions->getAllPermissions());
	}

	/**
	 * @param $id
	 * @param UpdateUserRequest $request
	 * @return mixed
	 */
	public function update($id, UpdateUserRequest $request) {
		$this->users->update($id,
			$request->except('assignees_roles', 'permission_user'),
			$request->only('assignees_roles'),
			$request->only('permission_user')
		);
		return redirect()->route('admin.access.users.index')->withFlashSuccess(trans("alerts.users.updated"));
	}

	/**
	 * @param $id
	 * @param DeleteUserRequest $request
	 * @return mixed
     */
	public function destroy($id, DeleteUserRequest $request) {
		$this->users->destroy($id);
		return redirect()->back()->withFlashSuccess(trans("alerts.users.deleted"));
	}

	/**
	 * @param $id
	 * @param PermanentlyDeleteUserRequest $request
	 * @return mixed
     */
	public function delete($id, PermanentlyDeleteUserRequest $request) {
		$this->users->delete($id);
		return redirect()->back()->withFlashSuccess(trans("alerts.users.deleted_permanently"));
	}

	/**
	 * @param $id
	 * @param RestoreUserRequest $request
	 * @return mixed
     */
	public function restore($id, RestoreUserRequest $request) {
		$this->users->restore($id);
		return redirect()->back()->withFlashSuccess(trans("alerts.users.restored"));
	}

	/**
	 * @param $id
	 * @param $status
	 * @param MarkUserRequest $request
	 * @return mixed
     */
	public function mark($id, $status, MarkUserRequest $request) {
		$this->users->mark($id, $status);
		return redirect()->back()->withFlashSuccess(trans("alerts.users.updated"));
	}

	/**
	 * @return mixed
	 */
	public function deactivated() {
		return view('backend.access.deactivated')
			->withUsers($this->users->getUsersPaginated(25, 0));
	}

	/**
	 * @return mixed
	 */
	public function deleted() {
		return view('backend.access.deleted')
			->withUsers($this->users->getDeletedUsersPaginated(25));
	}

	/**
	 * @return mixed
	 */
	public function banned() {
		return view('backend.access.banned')
			->withUsers($this->users->getUsersPaginated(25, 2));
	}

	/**
	 * @param $id
	 * @param ChangeUserPasswordRequest $request
	 * @return mixed
     */
	public function changePassword($id, ChangeUserPasswordRequest $request) {
		return view('backend.access.change-password')
			->withUser($this->users->findOrThrowException($id));
	}

	/**
	 * @param $id
	 * @param UpdateUserPasswordRequest $request
	 * @return mixed
	 */
	public function updatePassword($id, UpdateUserPasswordRequest $request) {
		$this->users->updatePassword($id, $request->all());
		return redirect()->route('admin.access.users.index')->withFlashSuccess(trans("alerts.users.updated_password"));
	}

	/**
	 * @param $user_id
	 * @param AuthenticationContract $auth
	 * @param ResendConfirmationEmailRequest $request
	 * @return mixed
     */
	public function resendConfirmationEmail($user_id, AuthenticationContract $auth, ResendConfirmationEmailRequest $request) {
		$auth->resendConfirmationEmail($user_id);
		return redirect()->back()->withFlashSuccess(trans("alerts.users.confirmation_email"));
	}

	public  function mohMap(){
		$state = DB::table('communicable_diseases')
			->select('village_name_text')
			->distinct()
			->get();

		return response()->json($state);
	}
}