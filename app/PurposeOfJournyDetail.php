<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurposeOfJournyDetail extends Model
{
		use SoftDeletes;
    protected $table = 'tour_purpose_of_journy_details';
    protected $guarded = [];

 // public function purpose_of_journy_details(){
 //        return $this->belongsTo('App\PurposeOfJournyDetail','last_id');
 //    }
     
}
