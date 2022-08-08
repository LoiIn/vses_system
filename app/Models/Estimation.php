<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    use HasFactory;

    protected $table = 'estimations';

    protected $fillable = ['video','param_1','param_2','param_3'];

    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function result(){
        return $this->hasOne(Result::class);
    }
}
