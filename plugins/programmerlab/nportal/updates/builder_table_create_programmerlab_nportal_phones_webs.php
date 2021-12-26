<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalPhonesWebs extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_phones_webs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->string('web_address', 255)->nullable();
            $table->string('web_link', 255)->nullable();
            $table->bigInteger('phone_no')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_phones_webs');
    }
}
