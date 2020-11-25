<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentCategories4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->string('sort_order', 255)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->integer('sort_order')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
