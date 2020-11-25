<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics10 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->string('sort_order', 255)->nullable(false)->default('1')->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->string('sort_order', 255)->nullable()->default(null)->change();
        });
    }
}
