<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalNewsportals extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_newsportals', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('link', 255)->nullable();
            $table->string('feature_img', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_newsportals');
    }
}
