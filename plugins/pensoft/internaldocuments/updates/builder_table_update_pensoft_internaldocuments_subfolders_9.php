<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftInternaldocumentsSubfolders9 extends Migration
{
    public function up()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->integer('user_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->dropColumn('user_id');
        });
    }
}
