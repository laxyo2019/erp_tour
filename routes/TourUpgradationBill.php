<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourUpgradationBill extends Model
{
    protected $table = 'tour_upgradation_bills';
    protected $guarded = [];

     public function TDetail(){
        return $this->belongsTo('App\TourUpgradation','ta_no');
    }
}
