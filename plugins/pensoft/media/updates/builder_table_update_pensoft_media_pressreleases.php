<?php namespace pensoft\Media\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftMediaPressreleases extends Migration
{
    public function up()
    {
        Schema::table('pensoft_media_pressreleases', function($table)
        {
            $table->text('link_cordis')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_media_pressreleases', function($table)
        {
            $table->dropColumn('link_cordis');
        });
    }
}
