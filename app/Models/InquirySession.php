<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InquirySession extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function inquiry()
    {
        return $this->belongsTo(Inquiry::class,'inquiry_id','id');
    }
}
