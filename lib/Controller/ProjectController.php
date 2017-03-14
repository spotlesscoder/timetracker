<?php
namespace OCA\TimeTracker\Controller;

use Exception;

use OCP\IRequest;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

use OCA\TimeTracker\Db\Project;
use OCA\TimeTracker\Db\ProjectMapper;

class ProjectController extends Controller
{
	private $mapper;
	private $userId;

	public function __construct($AppName, IRequest $request, NoteMapper $mapper, $UserId)
	{
		parent::__construct($AppName, $request);
		$this->mapper = $mapper;
		$this->userId = $UserId;
	}

	/**
	  * @NoAdminRequired
	  */
	public function index()
	{
		return new DataResponse($this->mapper->findAll($this->userId));
	}

	/**
	  * @NoAdminRequired
	  *
	  * @param int $id
	  */
	public function show($id)
	{
		try {
			return new DataResponse($this->mapper->find($id, $this->userId));
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
	}

	/**
	  * @NoAdminRequired
	  *
	  * @param string $name
	  * @param string $color
	  */
	public function create($name, $color)
	{
		$project = new Project();
		$project->setName($name);
		$project->setColor($color);
		$project->setUserId($this->userId);
		$project->setUpdatedAt(new DateTime());
		return new DataResponse($this->mapper->insert($project));
	}

	/**
	  * @NoAdminRequired
	  *
	  * @param int $id
	  * @param string $name
	  * @param string $color
	  */
	public function update($id, $name, $color)
	{
		try {
			$project = $this->mapper->find($id, $this->userId);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
		$project->setName($name);
		$project->setColor($color);
		$project->setUpdatedAt(new DateTime());
		return new DataResponse($this->mapper->update($project));
	}

	/**
	  * @NoAdminRequired
	  *
	  * @param int $id
	  */
	public function destroy($id)
	{
		try {
			$project = $this->mapper->find($id, $this->userId);
		} catch (Exception $e) {
			return new DataResponse([], Http::STATUS_NOT_FOUND);
		}
		$this->mapper->delete($project);
		return new DataResponse($project);
	}
}
