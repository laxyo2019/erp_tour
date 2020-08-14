<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TABill extends Model
{
    use SoftDeletes;
    protected $table ='tour_tour_amount_bills';
    protected $guarded=[];

    public function purpose_of_journy_details(){

        return $this->belongsTo('App\PurposeOfJournyDetail','id','last_id');
    }
    public function department(){
        return $this->belongsTo('App\emp_mast','id','user_id');
    }
    public function user_details(){
        return $this->belongsTo('App\User','user_id');
    }
   public function TDetail(){
        return $this->belongsTo('App\TourRequest','ta_no');
    }
}
