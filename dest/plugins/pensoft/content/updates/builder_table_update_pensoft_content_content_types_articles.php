<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypesArticles extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->integer('content_type_id')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_types_articles', function($table)
        {
            $table->dropColumn('content_type_id');
        });
    }
}
