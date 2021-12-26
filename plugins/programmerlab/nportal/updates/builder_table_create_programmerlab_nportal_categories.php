<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalCategories extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('display_name', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->text('description')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_categories');
    }
}
