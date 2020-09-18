<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateChristophheichCalendarEvents extends Migration
{
    public function up()
    {
        Schema::create('christophheich_calendar_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('color')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('christophheich_calendar_events');
    }
}
