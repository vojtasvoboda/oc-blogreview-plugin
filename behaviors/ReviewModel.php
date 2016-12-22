<?php namespace VojtaSvoboda\BlogReview\Behaviors;

use Db;
use System\Classes\ModelBehavior;

/**
 * RainLab.Blog Post model extension. Adds Review parameters relation to a model.
 */
class ReviewModel extends ModelBehavior
{
    public function __construct($model)
    {
        parent::__construct($model);

        $model->addFillable([
            'review_rating',
            'review_pros',
            'review_cons',
            'review_summary',
        ]);

        $model->hasMany['review_params'] = ['VojtaSvoboda\BlogReview\Models\ReviewParameter'];
    }
}
