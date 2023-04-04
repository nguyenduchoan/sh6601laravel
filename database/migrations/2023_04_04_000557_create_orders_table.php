<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('customer_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            // Tạo khóa ngoại tới bảng customers
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Xóa khóa ngoại trước khi xóa bảng
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('orders_customer_id_foreign');
        });

        Schema::dropIfExists('orders');
    }
}
