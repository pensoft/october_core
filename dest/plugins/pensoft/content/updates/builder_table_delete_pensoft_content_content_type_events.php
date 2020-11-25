<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeletePensoftContentContentTypeEvents extends Migration
{
    public function up()
    {
        Schema::dropIfExists('pensoft_content_content_type_events');
    }
    
    public function down()
    {
        Schema::create('pensoft_content_content_type_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('title', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location', 255)->nullable();
            $table->string('cover_image', 255)->nullable();
            $table->integer('content_type_id')->default(2);
            $table->string('slug', 255);
            $table->text('description');
        });
    }
}
