<?php namespace App\Http\Controllers;

use App\User;
use App\Models\Student;
use View;
use Validator;
use Input;
use Auth;
use Redirect;
use Hash;
class StudentController extends Controller {


		public function __construct()
		{
			$this->middleware('auth');
		}

		public function studentRecord()
		{
			return View::make('student.index');
		}


		public function saveStudenInfo()
		{
			if(!empty(Input::get('studId')))
			{
				$studInfo = Student::find(Input::get('studId'));
			}
			else
			{
				$studInfo = new Student();
			}
			
			$studInfo['stud_num'] = Input::get('studNo');
			$studInfo['fname'] = Input::get('fname');
			$studInfo['lname'] = Input::get('lname');
			$studInfo['address'] = Input::get('address');
			$studInfo['zip'] = Input::get('zip');
			$studInfo['city'] = Input::get('drpCity');
			$studInfo['state'] = Input::get('drpState');
			$studInfo['phone'] = Input::get('pnumber');
			$studInfo['mobile'] = Input::get('mnumber');
			$studInfo['email'] = Input::get('email');
			$studInfo['year_lvl'] = Input::get('drpYearLvl');
			$studInfo['section'] = Input::get('drpSection');
			if($studInfo->save())
			{
				return 1;
			}
			else
			{
				return 2;
			}
		}

		public function deleteStudent()
		{
			$stud_id = Input::get('stud_id');
			$User= Student::find($stud_id);
			if(!$User->delete())
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
}