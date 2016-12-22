<?php namespace VojtaSvoboda\BlogReview\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateReviewParametersTable extends Migration
{
    public function up()
    {
        Schema::create('vojtasvoboda_blogreview_review_parameters', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->integer('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('rainlab_blog_posts')->onDelete('cascade');

            $table->string('name', 300)->nullable();
            $table->string('value', 300)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vojtasvoboda_blogreview_review_parameters');
    }
}
