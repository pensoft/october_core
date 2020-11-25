<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLibraryRecords7 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->integer('pages')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->integer('pages')->default(null)->change();
        });
    }
}
