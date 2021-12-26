<?php namespace ProgrammerLab\Nportal\Models;

use Model;

/**
 * Model
 */
class PollLog extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
    ];


    public $belongsTo = [
        'poll' => 'ProgrammerLab\Nportal\Models\Poll'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'programmerlab_nportal_poll_logs';
}
