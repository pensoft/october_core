<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentArticles3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_articles', function($table)
        {
            $table->string('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_articles', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
