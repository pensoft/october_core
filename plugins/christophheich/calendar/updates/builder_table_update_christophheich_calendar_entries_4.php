<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEntries4 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->integer('category')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->dropColumn('category');
        });
    }
}
