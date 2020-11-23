<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLibraryRecords4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->boolean('visibility')->default(true);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->dropColumn('visibility');
        });
    }
}
