<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourRequest extends Model
{
    protected $table = 'tour_requests';
    protected $guarded = [];

    // public function user_details(){
    //     return $this->belongsTo('App\User','user_id');
    // }
    public function user_details(){
        return $this->hasOne('App\emp_mast','id','user_id');
    }    

}
