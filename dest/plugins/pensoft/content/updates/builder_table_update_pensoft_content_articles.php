<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentArticles extends Migration
{
    public function up()
    {
        Schema::rename('pensoft_content_content_types_articles', 'pensoft_content_articles');
    }
    
    public function down()
    {
        Schema::rename('pensoft_content_articles', 'pensoft_content_content_types_articles');
    }
}
