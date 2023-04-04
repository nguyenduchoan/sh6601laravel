<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->float('price', 10, 3);
            //Tạo khóa chính gồm 2 cột
            $table->primary(['order_id', 'product_id']);
            // Tạo khóa ngoại tới các bảng products và cútomers
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('product_id')->references('id')->on('orders');
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
        //Xóa khóa ngoại trước khi xóa bảng
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('order_details_order_id_foreign');
        });
        //Xóa khóa ngoại trước khi xóa bảng
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign('order_details_product_id_foreign');
        });
        Schema::dropIfExists('order_details');
    }
}
