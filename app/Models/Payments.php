<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_id','id');
    }
}
