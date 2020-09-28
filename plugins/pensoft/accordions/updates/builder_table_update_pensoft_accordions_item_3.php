<?php namespace pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftAccordionsItem3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->string('sort_order', 250)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->integer('sort_order')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
