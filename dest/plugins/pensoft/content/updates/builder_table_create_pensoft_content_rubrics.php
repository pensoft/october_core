<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentRubrics extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_rubrics', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('page_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_rubrics');
    }
}
