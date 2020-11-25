<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentNews2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_news', function($table)
        {
            $table->renameColumn('rubric_type_id', 'rubric_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_news', function($table)
        {
            $table->renameColumn('rubric_id', 'rubric_type_id');
        });
    }
}
