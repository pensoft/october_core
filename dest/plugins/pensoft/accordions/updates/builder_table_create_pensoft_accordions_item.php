<?php namespace pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftAccordionsItem extends Migration
{
    public function up()
    {
        Schema::create('pensoft_accordions_item', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('prefix', 255)->nullable();
            $table->string('title', 255);
            $table->text('body')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_accordions_item');
    }
}
