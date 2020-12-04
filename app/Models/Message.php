<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'message','key','decrypted','encrypted'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status() {
        return $this->hasOne(Status::class,'message_id','id');
    }

}
