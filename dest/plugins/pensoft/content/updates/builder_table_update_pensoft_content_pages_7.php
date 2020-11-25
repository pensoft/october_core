<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPages7 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->smallInteger('important')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->dropColumn('important');
        });
    }
}
