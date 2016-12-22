<?php namespace VojtaSvoboda\BlogReview\Models;

use Model;

/**
 * ReviewParameter Model
 */
class ReviewParameter extends Model
{
    public $table = 'vojtasvoboda_blogreview_review_parameters';

    protected $dates = ['created_at', 'updated_at'];

    public $belongsTo = [
        'post' => 'RainLab\Blog\Models\Post',
    ];
}
