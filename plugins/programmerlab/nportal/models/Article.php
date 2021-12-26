<?php namespace ProgrammerLab\Nportal\Models;

use Model;
use DB;
use BackendAuth;
use Carbon\Carbon;
use DateTimeZone;
use EasyBanglaDate\Types\BnDateTime;
use EasyBanglaDate\Types\DateTime as EnDateTime;

/**
 * Model
 */
class Article extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /*
     * Validation
     */
    public $rules = [
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


    public $belongsToMany = [
        'categories' => [
            'programmerlab\nportal\Models\Category',
            'table'    => 'programmerlab_nportal_article_category',
            'key'      => 'article_id',
            'otherKey' => 'category_id'
        ]
    ];

    /*
    * All scope functions here =============================================
    */
    public function scopeSearchByKeyword($query, $keyword)
    {
        $keyword = trim($keyword);
        $keyword = str_replace(" ","% %", $keyword);
        $keyword = "%".$keyword."%";

        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE","$keyword")
                    ->orWhere("short_title", "LIKE", "$keyword")
                    ->orWhere("hanger", "LIKE", "$keyword")
                    ->orWhere("shoulder", "LIKE", "$keyword");
            });
        }
        return $query;
    }

    // Created by columns=======================================================
     public function getCreatedByColAttribute(){
         if($this->created_by){
             $user = $this->createdBy;
             //$fullName = $user->first_name." ".$user->last_name;
             print_r($user);
             //return $user;
         }
         else{
             return "Author Not found";
         }
     }
     // Updated by columns======================================================
     public function getUpdatedByColAttribute(){
         if($this->updated_by){
             $user = $this->updatedBy;

             var_dump($user);
            // $fullName = $user->first_name." ".$user->last_name;
             return $user;
         }
         else{
             return "Author Not found";
         }
     }

    //  latest news ============================================================
    public static function getLatestNews($count){
      return self::where('status', 'published')
      ->orderBy('published_at', 'desc')
      ->take($count)
      ->get();
    }

    //  Most readed news =======================================================
    // public static function getTopNews($count){
    //   return self::where('status', 'published')
    //   ->orderBy('published_at', 'desc')
    //   ->orderBy('hit_count', 'desc')
    //   ->take($count)
    //   ->get();
    // }

    public static function getTopNews($count = 10, $catId = null){
        return self::where('status', 'published')
        ->where('created_at', '>=', Carbon::today())
        ->orderBy('hit_count', 'desc')
        ->take($count)
        ->get();
    }

    // date ===================================================================
    public function getBanglaDate($id = null){
        $articleID = $id ? $id : $this->id;
        $bongabda = new BnDateTime($this->attributes['published_at'], new DateTimeZone('Asia/Qatar'));
        return $bongabda->getDateTime()->format('l jS F Y b h:i:s');
    }

    public function getUpdatedBanglaDate($id = null){
        $articleID = $id ? $id : $this->id;
        $bongabda = new BnDateTime($this->attributes['updated_at'], new DateTimeZone('Asia/Qatar'));
        return $bongabda->getDateTime()->format('l jS F Y b h:i:s');
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'programmerlab_nportal_articles';

    // All event function=======================================================
    public function beforeCreate(){

        $this->published_at = Carbon::now();

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
