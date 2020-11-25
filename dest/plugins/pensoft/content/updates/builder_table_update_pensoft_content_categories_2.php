<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentCategories2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->renameColumn('order', 'sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->renameColumn('sort_order', 'order');
        });
    }
}
