<?php namespace Pensoft\Organization\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddPartner extends Migration
{
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->integer('partner_id')->nullable();
		});
	}

	public function down()
	{
		if (Schema::hasColumn('users', 'partner_id')) {
			Schema::table('users', function($table)
			{
				$table->dropColumn('partner_id');
			});
		}
	}
}
