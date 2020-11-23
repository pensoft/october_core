<?php namespace ChristophHeich\Calendar\Updates;

use Illuminate\Support\Facades\DB;
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEntries7 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            DB::statement('ALTER TABLE christophheich_calendar_entries ALTER COLUMN description TYPE text');
            $table->string('place')->nullable();
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->dropColumn('place');
            $table->dropColumn('slug');
        });
    }
}