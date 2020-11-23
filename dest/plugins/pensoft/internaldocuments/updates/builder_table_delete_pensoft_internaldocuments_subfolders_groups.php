<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeletePensoftInternaldocumentsSubfoldersGroups extends Migration
{
    public function up()
    {
        Schema::dropIfExists('pensoft_internaldocuments_subfolders_groups');
    }
    
    public function down()
    {
        Schema::create('pensoft_internaldocuments_subfolders_groups', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('subfolder_id');
            $table->string('name', 255);
            $table->integer('sort_order')->default(1);
        });
    }
}
