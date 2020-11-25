<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentNews extends Migration
{
    public function up()
    {
        Schema::rename('pensoft_content_content_type_news', 'pensoft_content_news');
    }
    
    public function down()
    {
        Schema::rename('pensoft_content_news', 'pensoft_content_content_type_news');
    }
}
