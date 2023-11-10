<?php

namespace fabienlk\mypov\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'target_Key',
        'user_id',
        'avatar',
        'body',
        'sort',
        'number_of_rows'
    ];
}

