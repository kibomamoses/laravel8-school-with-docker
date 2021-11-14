<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function getCompletedAttribute()
    {
        return $this->users->contains(auth()->user()->id);
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section');
    }

    public function platform()
    {
        return $this->belongsToMany('App\Models\Platform');
    }

    public function description()
    {
        return $this->hasOne('App\Models\Description');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
