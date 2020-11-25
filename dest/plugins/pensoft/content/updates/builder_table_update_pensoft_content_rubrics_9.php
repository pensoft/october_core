<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics9 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->integer('template_id')->default(1)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->integer('template_id')->default(null)->change();
        });
    }
}
