<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TourUpgradation extends Model
{
    protected $table = 'tour_upgradations';
    protected $guarded = [];

     public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
}
