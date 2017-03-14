<?php
namespace OCA\TimeTracker\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Record extends Entity implements JsonSerializable
{

	protected $taskId;
	protected $userId;
	protected $description;
	protected $startedAt;
	protected $endedAt;

	public function jsonSerialize()
	{
		return [
			'id' => $this->id,
			'task_id' => $this->taskId,
			'user_id' => $this->userId,
			'name' => $this->description,
			'started_at' => $this->startedAt,
			'ended_at' => $this->endedAt
		];
	}
}
