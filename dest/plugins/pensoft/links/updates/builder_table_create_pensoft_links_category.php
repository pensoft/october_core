<?php namespace Pensoft\Links\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftLinksCategory extends Migration
{
    public function up()
    {
        Schema::create('pensoft_links_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->string('slug', 255);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_links_category');
    }
}
