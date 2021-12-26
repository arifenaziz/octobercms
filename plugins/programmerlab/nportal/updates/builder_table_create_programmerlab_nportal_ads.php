<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalAds extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_ads', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('ad_img', 255)->nullable();
            $table->boolean('is_home_banner')->nullable()->default(0);
            $table->boolean('is_home_1')->nullable()->default(0);
            $table->boolean('is_home_2')->nullable()->default(0);
            $table->boolean('is_home_3')->nullable()->default(0);
            $table->boolean('is_home_4')->nullable()->default(0);
            $table->boolean('is_home_5')->nullable()->default(0);
            $table->boolean('is_home_6')->nullable()->default(0);
            $table->boolean('is_home_7')->nullable()->default(0);
            $table->boolean('is_home_8')->nullable()->default(0);
            $table->boolean('is_home_sidebar_1')->nullable()->default(0);
            $table->boolean('is_home_sidebar_2')->nullable()->default(0);
            $table->boolean('is_cat_1')->nullable()->default(0);
            $table->boolean('is_cat_2')->nullable()->default(0);
            $table->boolean('is_cat_sidebar_1')->nullable()->default(0);
            $table->boolean('is_cat_sidebar_2')->nullable()->default(0);
            $table->boolean('is_single_1')->nullable()->default(0);
            $table->boolean('is_single_2')->nullable()->default(0);
            $table->boolean('is_single_sidebar_1')->nullable()->default(0);
            $table->boolean('is_single_sidebar_2')->nullable()->default(0);
            $table->boolean('is_single_siderbar_3')->nullable()->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_ads');
    }
}
