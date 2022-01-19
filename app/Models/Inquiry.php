<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\Driver\Session;

class Inquiry extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
    public function tutor()
    {
        return $this->belongsTo(User::class,'tutor_id','id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class,'inquiry_id','id');
    }

    public function sessions()
    {
        return $this->hasMany(InquirySession::class,'inquiry_id','id');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class,'inquiry_id','id');
    }


}
