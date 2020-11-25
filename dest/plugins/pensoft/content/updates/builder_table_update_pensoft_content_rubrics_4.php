<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->string('icon_class')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->dropColumn('icon_class');
        });
    }
}
