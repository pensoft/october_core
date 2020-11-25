<?php namespace Pensoft\Content\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftContentPartners extends Migration
{
    public function up()
    {
        Schema::rename('pensoft_content_content_type_partners', 'pensoft_content_partners');
    }
    
    public function down()
    {
        Schema::rename('pensoft_content_partners', 'pensoft_content_content_type_partners');
    }
}
