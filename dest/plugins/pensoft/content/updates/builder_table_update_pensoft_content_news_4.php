<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentNews4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_news', function($table)
        {
            $table->smallInteger('state')->nullable()->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_news', function($table)
        {
            $table->dropColumn('state');
        });
    }
}
