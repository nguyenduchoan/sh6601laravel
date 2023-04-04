<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Psy\Shell;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id'); // id int unsigned primary key auto_increment
            $table->string('name', 200);
            $table->float('price', 10, 3);
            $table->float('sale_price', 10, 3)->default(0);
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('category_id')->unsigned();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            //Tạo khóa ngoại tới bảng categories, tên khóa ngoại có dạng products_category_id_foreign
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });

        Schema::dropIfExists('products');
    }
}
