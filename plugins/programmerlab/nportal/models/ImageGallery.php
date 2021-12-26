<?php namespace ProgrammerLab\Nportal\Models;

use Model;
use BackendAuth;

/**
 * Model
 */
class ImageGallery extends Model
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
    public $table = 'programmerlab_nportal_im_galleries';

    // user model relation======================================================
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

  // Created by columns=========================================================
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
  // Updated by columns=========================================================
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


    /*
   *   All Events functions ==================================================
   */

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
}
