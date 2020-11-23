<?php namespace pensoft\Media\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftMediaVideos extends Migration
{
    public function up()
    {
        Schema::table('pensoft_media_videos', function($table)
        {
            $table->string('vimeo_url', 255)->nullable();
            $table->renameColumn('link', 'youtube_url');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_media_videos', function($table)
        {
            $table->dropColumn('vimeo_url');
            $table->renameColumn('youtube_url', 'link');
        });
    }
}
