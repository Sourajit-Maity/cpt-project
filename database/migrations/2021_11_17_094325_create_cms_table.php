<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('text_content')->nullable();
            $table->string('image')->nullable();
            $table->string('content_1_title')->nullable();
            $table->longText('content_1_text')->nullable();
            $table->string('content_2_title')->nullable();
            $table->longText('content_2_text')->nullable();
            $table->string('content_3_title')->nullable();
            $table->longText('content_3_text')->nullable();
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
        Schema::dropIfExists('cms');
    }
}
