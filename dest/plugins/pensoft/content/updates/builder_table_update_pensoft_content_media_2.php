<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentMedia2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_media', function($table)
        {
            $table->string('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_media', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
