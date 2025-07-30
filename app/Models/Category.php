<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;

    protected $fillable = [
        'cat_name',
        'description',
        'created_at',
        'updated_at',
    ];
    protected $dates = ['deleted_at'];

    public function Item()
    {
        return $this->hasMany(Item::class, 'category_id',);
    }
}
