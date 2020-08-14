<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp_mast extends Model
{
    protected $table = 'emp_mast';
    protected $guarded = [];

    public function department(){
    	return $this->belongsTo('App\Department', 'dept_id','id');
    }

    public function designation(){
    	return $this->belongsTo('App\Designation', 'desg_id','id');
    }

    public function grade(){
    	return $this->belongsTo('App\Grade','grade_id','id');
    }

    public function company(){
    	return $this->belongsTo('App\company', 'comp_id','id');
    }

    public function user(){
        return $this->belongsTo('App\TourRequest','user_id','id');
    }
    public function branch_details(){
        return $this->belongsTo('App\Branch','branch_id','id');
    }


}
