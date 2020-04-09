<?php
/**
 * Author: Mohamed Elogail
 * Email: moh.elogail@gmail.com
 * Date: 16/01/2020
 * Time: 03:22 م
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reviewer_id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('parent_id')->default(0);
            $table->boolean('approved')->default(1);
            $table->morphs('model');
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
        Schema::dropIfExists('reviews');
    }
}
