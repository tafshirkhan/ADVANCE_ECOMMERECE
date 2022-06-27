<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub__sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id'); //foreign key
            $table->integer('subcategory_id');//foreign key
            $table->string('sub_subcategory_name');
            $table->string('sub_subcategory_slug');
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
        Schema::dropIfExists('sub__sub_categories');
    }
}
