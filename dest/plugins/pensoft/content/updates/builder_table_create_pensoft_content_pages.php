<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentPages extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_pages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_pages');
    }
}
