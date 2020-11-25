<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentRubricTypeBoard extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_rubric_type_board', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('rubric_type_id')->default(2);
            $table->string('full_name');
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->integer('positoin_type')->default(1);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_rubric_type_board');
    }
}
