<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'photo', 'model'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove relations to category
            $model->categories()->detach();
        });
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    public function getCategoryListsAttribute()
    {
        if ($this->categories()->count() < 1) {
            return null;
        }
        return $this->categories->lists('id')->all();
    }
}
