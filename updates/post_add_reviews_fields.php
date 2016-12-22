<?php namespace VojtaSvoboda\BlogReview\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class PostAddReviewsFields extends Migration
{
    private $columns = ['review_rating', 'review_pros', 'review_cons', 'review_summary'];

    public function up()
    {
        if (Schema::hasColumns('rainlab_blog_posts', $this->columns)) {
            return;
        }

        Schema::table('rainlab_blog_posts', function(Blueprint $table)
        {
            $table->string('review_rating', 300)->nullable()->after('content_html');
            $table->text('review_pros')->nullable()->after('review_rating');
            $table->text('review_cons')->nullable()->after('review_pros');
            $table->text('review_summary')->nullable()->after('review_cons');
        });
    }

    public function down()
    {
        if (Schema::hasTable('rainlab_blog_posts')) {
            Schema::table('rainlab_blog_posts', function ($table) {
                $table->dropColumn($this->columns);
            });
        }
    }
}
