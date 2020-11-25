<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeNews5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->integer('rubric_type_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_news', function($table)
        {
            $table->dropColumn('rubric_type_id');
        });
    }
}
