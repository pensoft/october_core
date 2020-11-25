<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics8 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->integer('template_id')->nullable();
            $table->dropColumn('rubric_type_id');
            $table->dropColumn('cover_icon');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->dropColumn('template_id');
            $table->integer('rubric_type_id')->default(1);
            $table->string('cover_icon', 255)->nullable();
        });
    }
}
