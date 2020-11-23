<?php namespace pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftAccordionsItem2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->integer('sort_order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
