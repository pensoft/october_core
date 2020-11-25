<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeletePensoftContentRubricTypes extends Migration
{
    public function up()
    {
        Schema::dropIfExists('pensoft_content_rubric_types');
    }
    
    public function down()
    {
        Schema::create('pensoft_content_rubric_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name', 255);
        });
    }
}
