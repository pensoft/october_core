<?php namespace ChristophHeich\Calendar\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateChristophheichCalendarCategories extends Migration
{
    public function up()
    {
        Schema::create('christophheich_calendar_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('identifier')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('christophheich_calendar_categories');
    }
}
