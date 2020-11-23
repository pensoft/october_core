<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLibraryRecords8 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->string('doi', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->string('doi', 255)->nullable(false)->change();
        });
    }
}
