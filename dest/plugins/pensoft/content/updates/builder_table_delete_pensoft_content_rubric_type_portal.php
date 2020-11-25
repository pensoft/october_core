<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeletePensoftContentRubricTypePortal extends Migration
{
    public function up()
    {
        Schema::dropIfExists('pensoft_content_rubric_type_portal');
    }
    
    public function down()
    {
        Schema::create('pensoft_content_rubric_type_portal', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->text('content')->nullable();
            $table->integer('rubric_type_id')->default(1);
            $table->text('file')->nullable();
            $table->integer('rubric_id')->nullable();
            $table->text('media')->nullable();
        });
    }
}
