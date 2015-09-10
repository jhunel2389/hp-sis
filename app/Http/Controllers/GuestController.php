<?php namespace App\Http\Controllers;

use View;
use Validator;
use Input;
use Auth;
use Redirect;
class GuestController extends Controller {


	public function __construct()
	{
		$this->middleware('guest');
	}


	public function getLogin()
	{
		if(!Auth::Check())
		{
			return View::make('user.login');
		}
	}

	public function postLogin()
	{
		$validator = Validator::make(Input::all(), array(
			'username' => 'required',
			'pass1' => 'required'
		));

		if ($validator -> fails())
		{
			return Redirect::route('getLogin')->withErrors($validate)->withInput();
		}
		else
		{
			$remember = (Input::has('remember')) ? true : false;
			
			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('pass1')
			), $remember);

			if($auth)
			{
				return Redirect::route('home');
			}
			else
			{
				return Redirect::route('getLogin')->with('fail','You entered the wrong login credentials, please try again');
			}
		}
	}

}