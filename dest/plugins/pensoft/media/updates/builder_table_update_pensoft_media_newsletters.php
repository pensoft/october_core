<?php namespace pensoft\Media\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftMediaNewsletters extends Migration
{
    public function up()
    {
        Schema::table('pensoft_media_newsletters', function($table)
        {
            $table->date('date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_media_newsletters', function($table)
        {
            $table->dropColumn('date');
        });
    }
}
