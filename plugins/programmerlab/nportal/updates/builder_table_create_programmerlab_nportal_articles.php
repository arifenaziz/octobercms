<?php namespace ProgrammerLab\Nportal\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateProgrammerlabNportalArticles extends Migration
{
    public function up()
    {
        Schema::create('programmerlab_nportal_articles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('slug', 255)->nullable();
            $table->string('title', 255)->nullable();
            $table->string('short_title', 255)->nullable();
            $table->string('hanger', 255)->nullable();
            $table->string('shoulder', 255)->nullable();
            $table->text('content')->nullable();
            $table->text('keywords')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('status', 255)->nullable();
            $table->string('feature_img', 255)->nullable();
            $table->boolean('is_feature_img')->default(0);
            $table->boolean('is_breaking')->default(0);
            $table->boolean('comment_box')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->integer('hit_count')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('author_img', 255)->nullable();
            $table->string('author_name', 255)->nullable();
            $table->string('author_designation', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programmerlab_nportal_articles');
    }
}
