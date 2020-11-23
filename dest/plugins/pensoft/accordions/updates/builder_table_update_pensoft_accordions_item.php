<?php namespace pensoft\Accordions\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftAccordionsItem extends Migration
{
    public function up()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->integer('category_id');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_accordions_item', function($table)
        {
            $table->dropColumn('category_id');
        });
    }
}
