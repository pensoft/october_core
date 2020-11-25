<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentBoard4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_board', function($table)
        {
            $table->text('short_description')->default('null');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_board', function($table)
        {
            $table->dropColumn('short_description');
        });
    }
}
