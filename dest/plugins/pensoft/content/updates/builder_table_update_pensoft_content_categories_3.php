<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentCategories3 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->integer('parent_id')->nullable();
            $table->integer('nest_left')->nullable();
            $table->integer('nest_right')->nullable();
            $table->integer('nest_depth')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_categories', function($table)
        {
            $table->dropColumn('parent_id');
            $table->dropColumn('nest_left');
            $table->dropColumn('nest_right');
            $table->dropColumn('nest_depth');
        });
    }
}
