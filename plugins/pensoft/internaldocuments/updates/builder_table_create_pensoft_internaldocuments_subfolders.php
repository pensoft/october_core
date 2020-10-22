<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftInternaldocumentsSubfolders extends Migration
{
    public function up()
    {
        Schema::create('pensoft_internaldocuments_subfolders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name');
            $table->integer('folder_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_internaldocuments_subfolders');
    }
}
