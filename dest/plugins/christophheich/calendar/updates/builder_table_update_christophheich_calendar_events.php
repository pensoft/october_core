<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEvents extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->string('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
