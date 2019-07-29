<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_publish')->default(false);
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('introduction');
            $table->longText('content');
            $table->unsignedBigInteger('author'); //Create a foreign key column      
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade'); //Foreign key and 'on delete'
            $table->unsignedBigInteger('category');//Create a foreign key column      
            $table->foreign('category')->references('id')->on('categories')->onDelete('cascade'); //Foreign key and 'on delete'            
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
        Schema::dropIfExists('articles');
    }
}
