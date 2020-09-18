<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLibraryRecords5 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->renameColumn('visibility', 'is_visible');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->renameColumn('is_visible', 'visibility');
        });
    }
}
