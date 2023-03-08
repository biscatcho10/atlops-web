<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_name',
        'category_image'
    ];

    public function subCategory()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function serviceCategory()
    {
        return $this->hasMany(Servicescategory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
