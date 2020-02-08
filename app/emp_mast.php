<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emp_mast extends Model
{
    protected $table = 'tour_emp_masts';
    protected $guarded = [];

    public function department(){
    	return $this->belongsTo('App\Department', 'dept_id');
    }

    public function designation(){
    	return $this->belongsTo('App\Designation', 'desg_id');
    }

    public function grade(){
    	return $this->belongsTo('App\Grade');
    }

    public function company(){
    	return $this->belongsTo('App\company', 'comp_id');
    }

    public function user(){
        return $this->belongsTo('App\TourRequest','user_id');
    }



}
