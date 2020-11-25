<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubricTypePortal3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->string('file_title')->nullable();
            $table->string('media_title')->nullable();
            $table->string('media_url')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->dropColumn('file_title');
            $table->dropColumn('media_title');
            $table->dropColumn('media_url');
        });
    }
}
