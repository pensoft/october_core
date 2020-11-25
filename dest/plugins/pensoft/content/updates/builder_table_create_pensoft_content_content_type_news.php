<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentContentTypeNews extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_content_type_news', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->date('date')->nullable();
            $table->string('title');
            $table->text('description');
            $table->integer('content_type_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_content_type_news');
    }
}
