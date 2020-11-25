<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPages extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->integer('rubric_type_id')->default(3);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->dropColumn('rubric_type_id');
        });
    }
}
