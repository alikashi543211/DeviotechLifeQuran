<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected  $guarded=[];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_id','id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
}
