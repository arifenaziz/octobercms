<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalPdf extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_pdf', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('file', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_pdf');
    }
}
