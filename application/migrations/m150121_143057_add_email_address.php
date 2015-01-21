<?php

class m150121_143057_add_email_address extends CDbMigration
{
	public function up()
	{
		$this->addColumn("{{user}}", "email", "VARCHAR(256) NULL");
	}

	public function down()
	{
		echo "m150121_143057_add_email_address does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}