<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('original_coupon_id');
            $table->string('user_id');
            $table->string('code');
            $table->string('amount');
            $table->integer('shop_id')->nullable();
            $table->string('discount_type');
            $table->string('description');
            $table->string('product_ids')->nullable();
            $table->string('date_expires')->nullable();
            $table->string('date_created')->nullable();
            $table->text('coupon_obj'); 
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
        Schema::dropIfExists('coupons');
    }
}
