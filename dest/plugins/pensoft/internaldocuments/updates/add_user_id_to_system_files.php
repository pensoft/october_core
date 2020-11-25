<?php namespace Pensoft\InternalDocuments\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddUserIdToSystemFiles extends Migration
{
	public function up()
	{
		Schema::table('system_files', function($table)
		{
			$table->integer('user_id')->default(5);
		});
	}

	public function down()
	{
		Schema::table('system_files', function($table)
		{
			$table->dropColumn('user_id');
		});
	}
}
