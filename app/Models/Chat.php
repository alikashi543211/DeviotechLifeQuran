<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;
protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'student_id','id');
    }
}
