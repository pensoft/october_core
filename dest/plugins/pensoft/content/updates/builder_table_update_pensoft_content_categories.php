<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentCategories extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->integer('order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->dropColumn('order');
        });
    }
}
