<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('subTitle')->nullable();
            $table->string('writerName');
            $table->string('writerImage')->nullable();
            $table->string('writerEmail');
            $table->string('wroted_at')->nullable();
            $table->string('resource')->nullable();
            $table->boolean('urgent')->default(0)->nullable();
            $table->string('category');
            $table->longText('body');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
}
