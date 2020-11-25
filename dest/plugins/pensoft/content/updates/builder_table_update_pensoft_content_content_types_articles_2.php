<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypesArticles2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->integer('page_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->dropColumn('page_id');
        });
    }
}
