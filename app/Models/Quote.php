<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;


class Quote extends Model
{
    protected $fillable = [
        'title', 'slug', 'subject', 'user_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userIsOwner()
    {
        return Auth::user()->id == $this->user->id;
    }
}
