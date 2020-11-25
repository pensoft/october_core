<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPages9 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->smallInteger('hide_from_menu')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_pages', function($table)
        {
            $table->smallInteger('hide_from_menu')->default(null)->change();
        });
    }
}
