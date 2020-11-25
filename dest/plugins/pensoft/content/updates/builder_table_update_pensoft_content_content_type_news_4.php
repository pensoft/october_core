<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeNews4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->dropColumn('cover_image');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->string('cover_image', 255)->nullable();
        });
    }
}
