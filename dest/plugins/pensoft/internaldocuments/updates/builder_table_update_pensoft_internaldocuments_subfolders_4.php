<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsSubfolders4 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->dropColumn('files_groups');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->text('files_groups')->nullable();
        });
    }
}
