<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentContentTypeEvents extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_content_type_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location')->nullable();
            $table->string('cover_image');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_content_type_events');
    }
}
