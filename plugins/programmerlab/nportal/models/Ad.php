<?php namespace ProgrammerLab\Nportal\Models;

use Model;

/**
 * Model
 */
class Ad extends Model
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
    public $table = 'programmerlab_nportal_ads';
}