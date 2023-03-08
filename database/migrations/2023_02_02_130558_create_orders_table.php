<?php

use App\Models\Categories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderName');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('subCategory')->nullable();
            $table->string('additionalService')->nullable();
            $table->json('photo_name');
            $table->string('photo_path');
            $table->string('orderDescription');
            $table->string('startPrice');
            $table->string('endPrice');
            $table->string('country');
            $table->string('country_name');
            $table->string('town');
            $table->string('town_name');
            $table->string('phone');
            $table->string('contact')->nullable();
            $table->enum('order_type',[0,1]);
            $table->enum('loved_order',[0,1])->default(0);
            $table->enum('ended_order',[0,1])->default(0);
            $table->string('date');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
