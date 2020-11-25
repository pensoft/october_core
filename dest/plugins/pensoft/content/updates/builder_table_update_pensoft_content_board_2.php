<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentBoard2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_board', function($table)
        {
            $table->dropColumn('rubric_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_board', function($table)
        {
            $table->integer('rubric_type_id')->default(2);
        });
    }
}
