<?php
namespace OCA\TimeTracker\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Task extends Entity implements JsonSerializable
{

	protected $projectId;
	protected $userId;
	protected $name;
	protected $lightness;
	protected $updatedAt;

	public function jsonSerialize()
	{
		return [
			'id' => $this->id,
			'project_id' => $this->projectId,
			'user_id' => $this->userId,
			'name' => $this->name,
			'lightness' => $this->lightness,
			'updated_at' => $this->updatedAt
		];
	}
}
