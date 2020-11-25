<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPartners2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_partners', function($table)
        {
            $table->dropColumn('content_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_partners', function($table)
        {
            $table->integer('content_type_id')->default(4);
        });
    }
}
