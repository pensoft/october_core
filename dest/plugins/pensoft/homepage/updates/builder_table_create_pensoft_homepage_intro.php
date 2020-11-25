<?php namespace Pensoft\Homepage\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftHomepageIntro extends Migration
{
    public function up()
    {
        Schema::create('pensoft_homepage_intro', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title');
            $table->text('description');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_homepage_intro');
    }
}
