<?php namespace Pensoft\Partners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftPartnersPartners5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_partners_partners', function($table)
        {
            $table->string('email')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_partners_partners', function($table)
        {
            $table->dropColumn('email');
        });
    }
}
