<?php namespace RainLab\User\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UsersAddPartner extends Migration
{

	public function up()
	{
		Schema::table('rainlab_user_mail_blockers', function($table)
		{
			$table->renameColumn('user_id', 'partner_id');
		});
	}

	public function down()
	{
		Schema::table('rainlab_user_mail_blockers', function($table)
		{
			$table->renameColumn('partner_id', 'user_id');
		});
	}

}
