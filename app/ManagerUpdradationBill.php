<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagerUpdradationBill extends Model
{
    protected $table = 'tour_manager_updradation_bills';
    protected $guarded = [];
    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
     public function TDetail(){
        return $this->belongsTo('App\TourRequest','ta_no');
    }

}
