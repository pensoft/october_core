<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentBoard extends Migration
{
    public function up()
    {
        Schema::rename('pensoft_content_rubric_type_board', 'pensoft_content_board');
    }
    
    public function down()
    {
        Schema::rename('pensoft_content_board', 'pensoft_content_rubric_type_board');
    }
}
