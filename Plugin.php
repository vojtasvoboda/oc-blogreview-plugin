<?php namespace VojtaSvoboda\BlogReview;

use Backend;
use File;
use RainLab\Blog\Controllers\Posts;
use RainLab\Blog\Models\Post;
use System\Classes\PluginBase;
use VojtaSvoboda\BlogReview\Models\Review;
use Yaml;

/**
 * BlogReview Plugin Information File
 */
class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Blog Review',
            'description' => 'Make reviews from blog posts and add ratings.',
            'author' => 'Vojta Svoboda',
            'icon' => 'icon-star-half-o',
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // extend RainLab.Blog Post model
        Post::extend(function($model)
        {
            // add ReviewModel behavior
            $model->implement[] = 'VojtaSvoboda.BlogReview.Behaviors.ReviewModel';
        });

        // extend RainLab.Blog Posts controller
        Posts::extendFormFields(function($form, $model, $context)
        {
            if (!$model instanceof Post) {
                return;
            }

            // review fields
            $configFile = __DIR__ . '/config/review_fields.yaml';
            $config = Yaml::parse(File::get($configFile));
            $form->addSecondaryTabFields($config);
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            // 'VojtaSvoboda\BlogReview\Components\PostReview' => 'postReview',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'vojtasvoboda.blogreview.review' => [
                'tab' => 'Blog Review',
                'label' => 'Review blog post',
            ],
        ];
    }
}
