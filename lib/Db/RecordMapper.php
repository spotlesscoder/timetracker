<?php
namespace OCA\TimeTracker\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class RecordMapper extends Mapper {

	public function __construct(IDb $db) {
		parent::__construct($db, 'timetracker_records', '\OCA\TimeTracker\Db\Record');
	}

	public function find($id, $userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_records WHERE id = ? AND user_id = ?';
		return $this->findEntity($sql, [$id, $userId]);
	}

	public function findAll($taskId, $userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_records WHERE task_id = ? AND user_id = ?';
		return $this->findEntities($sql, [$taskId, $userId]);
	}
}