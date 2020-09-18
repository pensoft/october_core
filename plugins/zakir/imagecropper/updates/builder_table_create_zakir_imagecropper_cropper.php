<?php namespace Zakir\ImageCropper\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateZakirImagecropperCropper extends Migration
{
    public function up()
    {
        Schema::create('zakir_imagecropper_cropper', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('type', 191)->nullable();
            $table->string('path', 191)->nullable();
            $table->text('data')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('zakir_imagecropper_cropper');
    }
}
