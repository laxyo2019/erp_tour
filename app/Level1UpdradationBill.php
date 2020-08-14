<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level1UpdradationBill extends Model
{
    protected $table = 'tour_level1_updradation_bills';
    protected $guarded = [];

     public function TDetail(){
        return $this->belongsTo('App\Level1Updradation','ta_no');
    }

    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
}
