<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentRubrics5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->text('description')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_content_rubrics', function($table)
        {
            $table->string('description', 255)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
