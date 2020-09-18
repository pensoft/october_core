<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateChristophheichCalendarCategories extends Migration
{
    public function up()
    {
        Schema::table('christophheich_calendar_categories', function($table)
        {
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('christophheich_calendar_categories', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
