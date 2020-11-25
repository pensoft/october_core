<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubricTypePortal extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->integer('rubric_type_id')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubric_type_portal', function($table)
        {
            $table->dropColumn('rubric_type_id');
        });
    }
}
