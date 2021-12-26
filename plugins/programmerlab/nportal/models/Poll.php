<?php namespace ProgrammerLab\Nportal\Models;

use Model;
use BackendAuth;
use Carbon\Carbon;
use DateTimeZone;
use EasyBanglaDate\Types\BnDateTime;

/**
 * Model
 */
class Poll extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
    ];

    public $hasMany = [
        'polllogs' => 'ProgrammerLab\Nportal\Models\PollLog'
    ];

    // relation with user ========================================================
    public $belongsTo = [
        'createdBy' => [
            'Backend\Models\User',
            'key' => 'created_by',
            'otherKey' => 'id'
        ],
        'updatedBy' => [
            'Backend\Models\User',
            'key' => 'updated_by',
            'otherKey' => 'id'
        ],
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'programmerlab_nportal_polls';

    // Created by columns=======================================================
     public function getCreatedByColAttribute(){
         if($this->created_by){
             $user = $this->createdBy;
             $fullName = $user->first_name." ".$user->last_name;
             return $fullName;
         }
         else{
             return "Author Not found";
         }
     }
     // Updated by columns======================================================
     public function getUpdatedByColAttribute(){
         if($this->updated_by){
             $user = $this->updatedBy;
             $fullName = $user->first_name." ".$user->last_name;
             return $fullName;
         }
         else{
             return "Author Not found";
         }
     }

    public function beforeCreate(){
        //Insert created_by user id
        $user = BackendAuth::getUser();
        if($user){
            $this->created_by = $user->id;
        }
    }

    public function beforeSave(){
        //Insert updated_by user id
        $user = BackendAuth::getUser();
        if($user){
            $this->updated_by = $user->id;
        }
    }

    public function getBanglaDate($id = null){
        $pollID = $id ? $id : $this->id;
        $bongabda = new BnDateTime($this->attributes['created_at'], new DateTimeZone('Asia/Dhaka'));
        return $bongabda->getDateTime()->format('l jS F Y b h:i:s');
    }
}
