<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentContentTypeEvents4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_content_type_events', function($table)
        {
            $table->string('cover_image', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_content_type_events', function($table)
        {
            $table->string('cover_image', 255)->nullable(false)->change();
        });
    }
}
