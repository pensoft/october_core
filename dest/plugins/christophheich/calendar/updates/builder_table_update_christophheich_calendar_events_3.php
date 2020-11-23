<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEvents3 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->renameColumn('category', 'identifier');
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_events', function($table)
        {
            $table->renameColumn('identifier', 'category');
        });
    }
}
