<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsSubfolders2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->string('files_groups')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->dropColumn('files_groups');
        });
    }
}
