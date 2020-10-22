<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsFolders extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_folders', function($table)
        {
            $table->renameColumn('sortorder', 'sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_folders', function($table)
        {
            $table->renameColumn('sort_order', 'sortorder');
        });
    }
}
