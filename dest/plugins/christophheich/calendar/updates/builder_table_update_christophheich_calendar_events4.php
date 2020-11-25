<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEvents4 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->string('identifier', 255)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->integer('identifier')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}