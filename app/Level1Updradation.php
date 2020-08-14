<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level1Updradation extends Model
{
    protected $table = 'tour_level1_upgradations';
    protected $guarded = [];
     public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
}
