<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'status','message_id','user_id'

    ];
    protected $table = 'status';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function messages()
    {
        return $this->belongsTo(Message::class, 'message_id','id');
    }
}
