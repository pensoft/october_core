<?php namespace Pensoft\Library\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftLibraryRecords extends Migration
{
    public function up()
    {
        Schema::create('pensoft_library_records', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('authors');
            $table->string('status')->nullable();
            $table->date('year');
            $table->string('journal_title')->nullable();
            $table->string('proceedings_title')->nullable();
            $table->string('monograph_title')->nullable();
            $table->string('deliverable_title')->nullable();
            $table->string('project_title')->nullable();
            $table->string('volume_issue')->nullable();
            $table->string('publisher')->nullable();
            $table->string('place')->nullable();
            $table->date('due_date')->nullable();
            $table->string('city')->nullable();
            $table->integer('pages');
            $table->string('doi');
            $table->string('derived')->nullable();
            $table->string('type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_library_records');
    }
}
