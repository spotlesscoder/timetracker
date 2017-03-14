<?php
namespace OCA\TimeTracker\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Project extends Entity implements JsonSerializable
{

	protected $userId;
	protected $name;
	protected $color;
	protected $updatedAt;

	public function jsonSerialize()
	{
		return [
			'id' => $this->id,
			'user_id' => $this->userId,
			'name' => $this->name,
			'color' => $this->color,
			'updated_at' => $this->updatedAt
		];
	}
}
