<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    // protected the id and the status, because the 
    // create of the course could change it without 
    // revision for the administrator
    protected $guarded = ['id', 'status'];

    // make a count of the student in every course, in an atribute
    protected $withCount = ['students', 'reviews'];

    // constant for the table, status
    const DRAFT = 1;
    const REVISION = 2;
    const PUBLISHED = 3;

    //Query Scope, to customize for categories
    public function scopeCategory($query, $category_id)
    {
        // if there is something in the category_id
        if ($category_id){
            return $query->where('category_id', $category_id);
        }
    }

    //Query Scope, to customize for level
    public function scopeLevel($query, $level_id)
    {
        // if there is something in the level_id
        if ($level_id){
            return $query->where('level_id', $level_id);
        }
    }

    // with getNameAttribute get a new attribute
    public function getRatingAttribute()
    {
        if($this->reviews_count){
            // return the collection of the reviews
            // with avg() get the average
            // rating is the name of the column
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }

    }

    // using slug
    public function getRouteKeyName()
    {
        return "slug";
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function teacher()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
   
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function price()
    {
        return $this->belongsTo('App\Models\Price');
    }

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
