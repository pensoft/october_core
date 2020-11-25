<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftContentContentTypePartners extends Migration
{
    public function up()
    {
        Schema::create('pensoft_content_content_type_partners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('logo');
            $table->string('title');
            $table->string('website')->nullable();
            $table->integer('content_type_id')->default(4);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_content_content_type_partners');
    }
}
