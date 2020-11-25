<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeNews extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->integer('content_type_id')->default(3)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->integer('content_type_id')->default(null)->change();
        });
    }
}
