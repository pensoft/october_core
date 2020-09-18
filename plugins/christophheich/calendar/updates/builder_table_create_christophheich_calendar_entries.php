<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateChristophheichCalendarEntries extends Migration
{
    public function up()
    {
        Schema::create('christophheich_calendar_entries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('color')->nullable();
            $table->string('text_color')->nullable();
            $table->string('rendering')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->boolean('all_day')->nullable();
            $table->boolean('display_event_end')->nullable();
            $table->boolean('display_event_time')->nullable();
            $table->integer('index')->nullable();
            $table->string('time_format')->nullable();
            $table->string('constraint')->nullable();
            $table->boolean('overlap')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('christophheich_calendar_entries');
    }
}
