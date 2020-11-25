<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsSubfolders extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->integer('sort_order')->default(1);
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
