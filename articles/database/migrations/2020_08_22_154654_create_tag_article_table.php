<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tag_article')) {
            Schema::create('tag_article', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('tag_id');
                $table->unsignedBigInteger('article_id');
                $table->timestamps();

                $table->index(['tag_id', 'article_id']);
                $table->foreign('tag_id')->on('tags')->references('id')->cascadeOnDelete();
                $table->foreign('article_id')->on('articles')->references('id')->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_article');
    }
}
