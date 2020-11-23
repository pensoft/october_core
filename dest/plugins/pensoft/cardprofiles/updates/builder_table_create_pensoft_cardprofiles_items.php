<?php namespace pensoft\Cardprofiles\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftCardprofilesItems extends Migration
{
    public function up()
    {
        Schema::create('pensoft_cardprofiles_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('names', 255);
            $table->text('content')->nullable();
            $table->integer('category_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_cardprofiles_items');
    }
}
