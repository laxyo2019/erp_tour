<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourUpgradationBill extends Model
{
    protected $table = 'tour_upgradations_bill';
    protected $guarded = [];

     public function TDetail(){
        return $this->belongsTo('App\TourUpgradation','ta_no');
    }
    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
}
