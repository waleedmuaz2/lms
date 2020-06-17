<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
	public function teacher()
	{
		return $this->hasOne('App\Teacher','id','teacher_id');
	}
	public function class()
	{
		return $this->hasOne('App\ClassList','id','class_id');
	}
}
