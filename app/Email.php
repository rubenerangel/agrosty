<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'name', 'email', 'asunto', 'mensaje', 'spam',
    ];

    protected $table='mails';
}
