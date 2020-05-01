<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable=['title','description','price','type','user_id','photo','published'];

    public function user(){
        return $this->belongsTo('App\User','owner_id');
    }
}
