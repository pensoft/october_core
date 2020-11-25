<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeNews2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->string('cover_image')->nullable();
            $table->renameColumn('date', 'publication_date');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->dropColumn('cover_image');
            $table->renameColumn('publication_date', 'date');
        });
    }
}
