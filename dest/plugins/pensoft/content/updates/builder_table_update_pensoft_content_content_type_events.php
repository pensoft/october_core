<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeEvents extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_events', function($table)
        {
            $table->integer('content_type_id')->default(2);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_events', function($table)
        {
            $table->dropColumn('content_type_id');
        });
    }
}
