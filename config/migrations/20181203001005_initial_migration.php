<?php
use Phinx\Db\Adapter\MysqlAdapter;
use Phinx\Migration\AbstractMigration;

/**
 * Initial Migration
 */
class InitialMigration extends AbstractMigration {
	/**
	 * Change Method.
	 * Write your reversible migrations using this method.
	 * More information on writing migrations is available here:
	 * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
	 * The following commands can be used in this method and Phinx will
	 * automatically reverse them when rolling back:
	 *    createTable
	 *    renameTable
	 *    addColumn
	 *    addCustomColumn
	 *    renameColumn
	 *    addIndex
	 *    addForeignKey
	 * Any other destructive changes will result in an error when trying to
	 * rollback the migration.
	 * Remember to call "create()" or "update()" and NOT "save()" when working
	 * with the Table class.
	 */
	public function change() {
		$this->table('activities')
			->addColumn('application_id', 'uuid', ['null' => true])
			->addColumn('stream_id', 'uuid', ['null' => true])
			->addColumn('actor_id', 'uuid', ['null' => true])
			->addColumn('published', 'timestamp', ['null' => false])
			->addColumn('verb', 'string', ['length' => 32, 'null' => false])
			->addColumn('object_id', 'string', ['length' => 255, 'null' => true])
			->addColumn('target_id', 'uuid', ['null' => true])
			->addColumn('values', 'text', ['length' => MysqlAdapter::TEXT_LONG])
			->addColumn('title', 'text', ['length' => 255, 'null' => false])
			->create();

		$this->table('applications')
			->addColumn('name', 'string', ['length' => 128, 'null' => false])
			->addColumn('secret', 'string', ['length' => 32, 'null' => false])
			->create();

		$this->table('objects')
			->addColumn('application_id', 'uuid', ['null' => false])
			->addColumn('object_type', 'string', ['null' => true, 'default' => null])
			->addColumn('url', 'text', ['length' => 255, 'null' => true, 'default' => null])
			->addColumn('values', 'text', ['length' => MysqlAdapter::TEXT_LONG])
			->create();

		$this->table('streams')
			->addColumn('application_id', 'uuid', ['null' => false])
			->addColumn('name', 'string', ['length' => 255, 'null' => true, 'default' => null])
			->addColumn('update_timestamp', 'timestamp', ['null' => true, 'default' => null])
			->addColumn('auto_subscribe', 'bool', ['default' => false])
			->create();

		$this->table('subscriptions')
			->addColumn('application_id', 'uuid', ['null' => false])
			->addColumn('stream_id', 'uuid', ['null' => false])
			->addColumn('object_id', 'uuid', ['null' => false])
			->create();

		$this->table('unsubscriptions')
			->addColumn('application_id', 'uuid', ['null' => false])
			->addColumn('stream_id', 'uuid', ['null' => false])
			->addColumn('object_id', 'uuid', ['null' => false])
			->create();
	}
}
