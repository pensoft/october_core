<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypesArticles3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->dropColumn('cover_image');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->string('cover_image', 255)->nullable();
        });
    }
}
