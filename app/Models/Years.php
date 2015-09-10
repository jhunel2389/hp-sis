<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Years extends Model
{
	protected $table =  'fm_year';

	public function listBySection()
	{
		return $this->hasMany('App\Models\Section','year_id');  
	}
}

