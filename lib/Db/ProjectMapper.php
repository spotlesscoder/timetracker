<?php
namespace OCA\TimeTracker\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class ProjectMapper extends Mapper {

	public function __construct(IDb $db) {
		parent::__construct($db, 'timetracker_projects', '\OCA\TimeTracker\Db\Project');
	}

	public function find($id, $userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_projects WHERE id = ? AND user_id = ?';
		return $this->findEntity($sql, [$id, $userId]);
	}

	public function findAll($userId) {
		$sql = 'SELECT * FROM *PREFIX*timetracker_projects WHERE user_id = ?';
		return $this->findEntities($sql, [$userId]);
	}

}