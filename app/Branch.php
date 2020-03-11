<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table ='hrms_comp_branch';
    protected $guarded=[];

    public function company_details(){
        return $this->belongsTo('App\Company','comp_id');
    }
}
