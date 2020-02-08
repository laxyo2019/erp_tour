<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $table = 'tour_tour_request';
    protected $guarded = [];

    public function department(){
        return $this->belongsTo('App\emp_mast','id','user_id');
    }

    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }    

}
