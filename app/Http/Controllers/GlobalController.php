<?php namespace App\Http\Controllers;

use App\User;
use App\Models\Years;
use App\Models\Section;
use App\Models\City;
use App\Models\State;
use App\Models\Student;
use View;
use Validator;
use Input;
use Auth;
use Redirect;
use Excel;

class GlobalController extends Controller {


		public function __construct()
		{
			$this->middleware('auth');
		}

		public function getReports()
		{
			return View::Make('report.index');
		}

		public function yearInfo($id)
		{
			return Years::find($id);
		}

		public function secInfo($id)
		{
			return Section::find($id);
		}

		public function allYears()
		{
			$response = array();
			$infos = Years::all();

			if(!empty($infos))
			{
				foreach ($infos as $info) {
					$response[] = array(
						"info_id"			=>$info['id'],
						"data_description"		=>$info['description'],
					);
				}
			}
			return $response;
		}


		public function allSections()
		{
			$response = array();
			$infos = Section::all();

			if(!empty($infos))
			{
				foreach ($infos as $info) {

					$response[] = array(
						"info_id"				=>	$info['id'],
						"year"					=>	$this->yearInfo($info['year_id'])['description'],
						"year_id"				=>	$info['year_id'],
						"data_description"		=>	$info['description'],
					);
				}
			}
			return $response;
		}

		public function sectionByYear()
		{
			$response = array();
			$infos = Years::find(Input::get('drpYearLvl'))['listBySection'];

			if(!empty($infos))
			{
				foreach ($infos as $info) {

					$response[] = array(
						"info_id"				=>	$info['id'],
						"year"					=>	$this->yearInfo($info['year_id'])['description'],
						"year_id"				=>	$info['year_id'],
						"data_description"		=>	$info['description'],
					);
				}
			}
			return $response;
		}

		public function allCity()
		{
			$response = array();
			$infos = City::all();

			if(!empty($infos))
			{
				foreach ($infos as $info) {

					$response[] = array(
						"info_id"				=>$info['id'],
						"data_description"		=>$info['city'],
					);
				}
			}
			return $response;
		}

		public function allState()
		{
			$response = array();
			$infos = State::all();

			if(!empty($infos))
			{
				foreach ($infos as $info) {

					$response[] = array(
						"info_id"				=>$info['id'],
						"data_description"		=>$info['state'],
					);
				}
			}
			return $response;
		}

		public function allStudent()
		{
			$response = array();
			$infos = Student::all();

			if(!empty($infos))
			{
				foreach ($infos as $info) {

					$response[] = array(
						"stud_id"			=>$info['id'],
						"stud_fname"		=>$info['fname'],
						"stud_lname"		=>$info['lname'],
					);
				}
			}
			return $response;
		}

		public function getStudInfo()
		{
			$studId = Input::get('studId');
			return Student::find($studId);
		}

		public function generateReportBy()
		{
			$response = array();
			$dbColumn = Input::get('dbColumn');
			$value = Input::get('value');
			$infos =  Student::where($dbColumn,'=',$value)->orderBy('lname', 'asc')->get();

			foreach ($infos as $info) {
				$response[] = array(
					"stud_id"			=>	$info['id'],
					"stud_fname"		=>	$info['fname'],
					"stud_lname"		=>	$info['lname'],
					"stud_year"			=>	$this->yearInfo($info['year_lvl'])['description'],
					"stud_section"		=>	$this->secInfo($info['section'])['description'],
				);
			}

			/*Excel::create('Filename', function($excel) use($infos){
			    $excel->sheet('Sheetname', function($sheet) use($infos){

			        $sheet->fromArray($infos);

			    });

			})->download('xlsx');*/

			//$this->exportUserList($infos);

			return $response;			
		}

		/*public function exportUserList(UserListExport $export)
	    {
	        // work on the export
	        return $export->sheet('sheetName', function($sheet)
	        {

	        })->export('xls');
	    }*/
}