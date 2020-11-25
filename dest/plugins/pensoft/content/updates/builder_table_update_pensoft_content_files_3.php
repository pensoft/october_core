<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentFiles3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_files', function($table)
        {
            $table->integer('page_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_files', function($table)
        {
            $table->dropColumn('page_id');
        });
    }
}
