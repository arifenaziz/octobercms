<?php namespace ProgrammerLab\Nportal\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'programmerlab_nportal_categories';

    // relation with article ===================================================
    public $belongsToMany = [
        'articles' => [
            'programmerlab\nportal\Models\Article',
            'table'    => 'programmerlab_nportal_article_category',
            'key'      => 'category_id',
            'otherKey' => 'article_id'
        ]
    ];
}
