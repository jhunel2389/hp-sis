<?php namespace App\Http\Controllers;

use App\User;
use App\Models\Years;
use App\Models\Section;
use App\Models\City;
use App\Models\State;
use View;
use Validator;
use Input;
use Auth;
use Redirect;

class FileMaintenanceController extends Controller {

		public function __construct()
		{
			$this->middleware('auth');
		}

		public function all()
		{
			return View::make('filemaintenance.index');
		}

		public function saveNewSectionRecord()
		{
			$section = new Section();
			$section['year_id'] = Input::get('drpYear');
			$section['description'] = Input::get('txtSection');
			if($section->save())
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}

		public function saveNewYearRecord()
		{
			$year = new Years();
			$year['description'] = Input::get('txtYear');
			if($year->save())
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}

		public function saveNewCityRecord()
		{
			$city = new City();
			$city['city'] = Input::get('txtCity');
			if($city->save())
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}

		public function saveNewStateRecord()
		{
			$state = new State();
			$state['state'] = Input::get('txtState');
			if($state->save())
			{
				return 1;
			}
			else
			{
				return 0;
			}
		}

}