<?php namespace Pensoft\Articles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftArticlesArticle extends Migration
{
    public function up()
    {
        Schema::table('pensoft_articles_article', function($table)
        {
            $table->smallInteger('type')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_articles_article', function($table)
        {
            $table->dropColumn('type');
        });
    }
}
