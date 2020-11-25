<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubricTypeBoard2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubric_type_board', function($table)
        {
            $table->renameColumn('page_id', 'rubric_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubric_type_board', function($table)
        {
            $table->renameColumn('rubric_id', 'page_id');
        });
    }
}
