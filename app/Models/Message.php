<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['content'];
    protected $primaryKey = 'message_id';

    public function user(){
        return $this->belongsTo(Message::class, "user_id");
    }
}
