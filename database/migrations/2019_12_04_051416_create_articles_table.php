<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('title', 100)->unique();
            $table->string('slug');
            $table->text('excerpt', 300);
            $table->text('body');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');

            $table->unsignedInteger('category_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');

            $table->boolean('is_approved')->default(false);
            $table->date('publish_at')->nullable();
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
