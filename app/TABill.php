<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TABill extends Model
{
    
    protected $table ='tour_amount_bills';
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
}
