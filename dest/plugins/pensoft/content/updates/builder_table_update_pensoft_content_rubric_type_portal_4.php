<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubricTypePortal4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->dropColumn('media_icon');
            $table->dropColumn('file_title');
            $table->dropColumn('media_title');
            $table->dropColumn('media_url');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->string('media_icon', 255)->nullable();
            $table->string('file_title', 255)->nullable();
            $table->string('media_title', 255)->nullable();
            $table->string('media_url', 255)->nullable();
        });
    }
}
