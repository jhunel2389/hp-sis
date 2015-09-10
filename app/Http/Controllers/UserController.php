<?php namespace App\Http\Controllers;

use App\User;
use View;
//use Validator;
use Input;
use Auth;
use Redirect;
use Hash;
class UserController extends Controller {


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getCreate()
	{
		return View::make('user.register');
	}

	// get the view for the login page


	public function postCreate()
	{
			$user = new User();
			$user -> username = Input::get('username');
			$user -> password = Hash::make(Input::get('pass1'));
			$user -> isAdmin = (Input::get('isAdmin') == 'true') ? 1 : 0;
			if ($user -> save())
			{
				return 1;//Redirect::Route('home')->with('success','Your regestered successfully. You can now log in.');
			}
			else
			{
				return 0;//Redirect::Route('home')->with('fail','An error occured while creating the user. Please try again.');
			}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('home');
	}

	public function checkUsername()
	{
		$username = Input::get('username');
		$result = User::where('username','=',$username)->get();

		if(count($result) == 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}


	public function allAccount()
	{
		$response = array();
		$users = User::all();

		if(!empty($users))
		{
			foreach ($users as $user) {
				$response[] = array(
					"user_id"			=>$user['id'],
					"username"			=>$user['username'],
				);
			}
		}


		return $response;
	}

	public function deleteAccount()
	{
		$acct_id = Input::get('acct_id');
		$User= User::find($acct_id);
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