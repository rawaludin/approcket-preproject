<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'parent_id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove parent from this category's child
            foreach ($model->childs as $child) {
                $child->parent_id = '';
                $child->save();
            }
            // remove relations to products
            $model->products()->detach();
        });
    }

    public function childs()
    {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    /**
     * Get total amount of product from current category and its child
     * @return int
     */
    public function getTotalProductsAttribute()
    {
        return Product::whereIn('id', $this->related_products_id)->count();
    }

    /**
     * Get all product id from active category and its child
     */
    public function getRelatedProductsIdAttribute()
    {
        $result = $this->products->lists('id')->toArray();
        foreach ($this->childs as $child) {
            $result = array_merge($result, $child->related_products_id);
        }
        return $result;
    }
}
