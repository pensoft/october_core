<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEntries5 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->renameColumn('category', 'identifier');
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->renameColumn('identifier', 'category');
        });
    }
}
