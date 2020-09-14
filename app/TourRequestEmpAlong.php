<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourRequestEmpAlong extends Model
{
    protected $table = 'tour_request_emp_along';

    protected $guarded = [];

    public function employee(){
    	return $this->belongsTo('App\emp_mast', 'user_id', 'user_id');
    }

    public function grade(){
        return $this->belongsTo('App\HrmsGrade', 'grade_id');
    }
}
