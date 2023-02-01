<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('rate')->default(0);
            $table->text('review')->nullable();
            $table->string('reason')->nullable();
            $table->enum('status',['pending','accept','reject'])->default('accept');
            
            $table->foreignId('user_id')->referances('id')->on('users')->onDelete('cascade');
            $table->foreignId('product_id')->referances('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_reviews');
    }
}
