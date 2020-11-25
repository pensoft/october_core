<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPages2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->integer('category_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->integer('category_id')->nullable(false)->change();
        });
    }
}
