<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalContacts extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('u_name', 255)->nullable();
            $table->string('u_email', 255)->nullable();
            $table->string('u_phone', 255)->nullable();
            $table->string('u_sub', 255)->nullable();
            $table->text('u_message')->nullable();
            $table->boolean('readed')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_contacts');
    }
}
