<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsFolders2 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_folders', function($table)
        {
            $table->string('slug')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_folders', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}
