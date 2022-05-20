<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('customer_id');
            $table->string('original_customer_id');
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('user_id');
            $table->string('shop_id');
            $table->string('phone')->nullable();
            $table->string('city')->nullable(); 
            $table->string('country')->nullable();
            $table->string('order_created_at')->nullable(); 
            $table->string('order_modified_at')->nullable(); 
            $table->text('order_obj'); 
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
        Schema::dropIfExists('customers');
    }
}
