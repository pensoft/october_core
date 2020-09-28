<?php namespace pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftAccordionsItem4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->string('sort_order', 250)->default('1')->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->string('sort_order', 250)->default(null)->change();
        });
    }
}
