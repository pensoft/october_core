<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentContentTypesArticles extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_content_types_articles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('publication_date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_content_types_articles');
    }
}
