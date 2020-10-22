<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UsersChangePartnerColumn extends Migration
{

	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->renameColumn('partner', 'partner_id');
		});
	}

	public function down()
	{
		Schema::table('users', function($table)
		{
			$table->renameColumn('partner_id', 'partner');
		});
	}

}
