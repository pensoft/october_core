<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubricTypeBoard5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubric_type_board', function($table)
        {
            $table->dropColumn('image');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubric_type_board', function($table)
        {
            $table->string('image', 255)->nullable();
        });
    }
}
