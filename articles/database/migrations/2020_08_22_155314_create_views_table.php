<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('views')) {
            Schema::create('views', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('article_id');
                $table->timestamps();

                $table->index(['article_id']);
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
        Schema::dropIfExists('views');
    }
}
