<?php
namespace OCA\TimeTracker\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class TaskMapper extends Mapper {

	public function __construct(IDb $db) {
		parent::__construct($db, 'timetracker_tasks', '\OCA\TimeTracker\Db\Task');
	}

	public function find($id, $userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_tasks WHERE id = ? AND user_id = ?';
		return $this->findEntity($sql, [$id, $userId]);
	}

	public function findAll($projectId, $userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_tasks WHERE project_id = ? AND user_id = ?';
		return $this->findEntities($sql, [$projectId, $userId]);
	}
}