<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourRequest extends Model
{
	use SoftDeletes;
    protected $table = 'tour_tour_requests';
    protected $guarded = [];

    public function department(){
        return $this->belongsTo('App\emp_mast','id','user_id');
    }

    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }    

    public function emp_along(){
    	return $this->hasMany('App\TourRequestEmpAlong', 'tour_request_id');
    }

    
}
