<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftLibraryRecords extends Migration
{
    public function up()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_library_records', function($table)
        {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
    }
}
