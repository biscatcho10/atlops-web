<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderName',
        'category_id',
        'user_id',
        'subCategory',
        'additionalService',
        'photo_name',
        'photo_path',
        'orderDescription',
        'startPrice',
        'endPrice',
        'country',
        'town',
        'country_name',
        'town_name',
        'phone',
        'contact',
        'date',
        'loved_order',
        'ended_order',
        'order_type',
    ];

    protected $casts = [
        'photo_name' => 'array'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function getCateg($id)
    {
        $category = Category::where('id', $id)->first();
        return $category->category_name;
    }

    public function getUserInfo($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    public function favUsers()
    {
        return $this->belongsToMany(Favorites::class, 'favorites');
    }

    public function getfav($user_id, $order_id)
    {
        return Favorites::where(['user_id' => $user_id, 'order_id' => $order_id])->exists();
    }
}
