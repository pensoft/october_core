<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentFiles extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_files', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_files');
    }
}
