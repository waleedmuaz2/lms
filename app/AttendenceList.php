<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendenceList extends Model
{
    protected $table = 'attendence';

	public function teacher()
	{
		return $this->hasOne('App\Teacher','id','teacher_id');
	}

}
