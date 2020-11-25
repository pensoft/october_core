<?php namespace pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftCardprofilesItems extends Migration
{
    public function up()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->string('country', 255)->nullable();
            $table->string('position', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_cardprofiles_items', function($table)
        {
            $table->dropColumn('country');
            $table->dropColumn('position');
        });
    }
}
