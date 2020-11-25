<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->integer('rubric_type_id')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->dropColumn('rubric_type_id');
        });
    }
}
