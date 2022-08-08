<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';
    protected $fillable = ['estimation_id','folder_images','csv_file'];

    public function estimation(){
        return $this->belongsTo(Estimation::class);
    }
}
