<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalPollLogs extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_poll_logs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('poll_id')->nullable();
            $table->integer('vote_count')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_poll_logs');
    }
}
