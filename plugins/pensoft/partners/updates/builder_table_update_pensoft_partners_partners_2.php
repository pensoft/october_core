<?php namespace Pensoft\Partners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftPartnersPartners2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_partners_partners', function($table)
        {
            $table->integer('country_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_partners_partners', function($table)
        {
            $table->dropColumn('country_id');
        });
    }
}
