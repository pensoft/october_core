<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarEntries2 extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->string('class_name')->nullable();
            $table->boolean('editable')->nullable();
            $table->boolean('start_editable')->nullable();
            $table->boolean('duration_editable')->nullable();
            $table->boolean('resource_editable')->nullable();
            $table->string('source')->nullable();
            $table->string('background_color')->nullable();
            $table->string('border_color')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_entries', function($table)
        {
            $table->dropColumn('class_name');
            $table->dropColumn('editable');
            $table->dropColumn('start_editable');
            $table->dropColumn('duration_editable');
            $table->dropColumn('resource_editable');
            $table->dropColumn('source');
            $table->dropColumn('background_color');
            $table->dropColumn('border_color');
        });
    }
}
