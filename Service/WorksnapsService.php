<?php
// src/Umbrella/Worksnaps/Service/Worksnaps.php
namespace Umbrella\WorksnapsBundle\Service;

use Symfony\Component\DependencyInjection\Container;
use Umbrella\WorksnapsBundle\Api\ProjectApi;
use Umbrella\WorksnapsBundle\Api\TaskApi;
use Umbrella\WorksnapsBundle\Api\UserAccountApi;
use Umbrella\WorksnapsBundle\Api\ReportApi;
use Umbrella\WorksnapsBundle\Api\TimeEntryApi;
use Umbrella\WorksnapsBundle\Api\TaskAssignmentApi;
use Umbrella\WorksnapsBundle\Api\UserAssignmentApi;

/**
 * Class WorksnapsService
 * @package Umbrella\WorksnapsBundle\Service
 */
class WorksnapsService
{
    /**
     * @var mixed
     */
    private $worksnapsApiKey;

    /**
     * @var ProjectApi
     */
    private $projectApi;

    /**
     * @var TaskApi
     */
    private $taskApi;

    /**
     * @var UserAccountApi
     */
    private $userAccountApi;

    /**
     * @var ReportApi
     */
    private $reportApi;

    /**
     * @var TimeEntryApi
     */
    private $timeEntryApi;

    /**
     * @var TaskAssignmentApi
     */
    private $taskAssignmentApi;

    /**
     * @var UserAssignmentApi
     */
    private $userAssignmentApi;

    /**
     * WorksnapsService constructor.
     *
     * @param Container $container
     */
    public function __construct(Container $container)
    {

        $this->worksnapsApiKey = $container->getParameter('worksnaps.api_key');

        $this->projectApi        = new ProjectApi($this->worksnapsApiKey);
        $this->taskApi           = new TaskApi($this->worksnapsApiKey);
        $this->userAccountApi    = new UserAccountApi($this->worksnapsApiKey);
        $this->reportApi         = new ReportApi($this->worksnapsApiKey);
        $this->timeEntryApi      = new TimeEntryApi($this->worksnapsApiKey);
        $this->taskAssignmentApi = new TaskAssignmentApi($this->worksnapsApiKey);
        $this->userAssignmentApi = new UserAssignmentApi($this->worksnapsApiKey);
    }

    /**
     * @return array
     */
    public function getProjects()
    {
        return $this->projectApi->getProjects();
    }

    /**
     * @param $projectId
     *
     * @return mixed
     */
    public function getProject($projectId)
    {
        return $this->projectApi->getProject($projectId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getTasks($projectId)
    {
        return $this->taskApi->getTasks($projectId);
    }

    /**
     * @param $projectId
     * @param $taskId
     * @param bool $includeTaskAssignment
     *
     * @return mixed
     */
    public function getTask($projectId, $taskId, $includeTaskAssignment = false)
    {
        return $this->taskApi->getTask($projectId, $taskId, $includeTaskAssignment);
    }

    /**
     * @return mixed
     */
    public function getMyUser()
    {
        return $this->userAccountApi->getMyUser();
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->userAccountApi->getUsers();
    }

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function getUser($userId)
    {
        return $this->userAccountApi->getUser($userId);
    }

    /**
     * @param $projectId
     * @param $fromTimestamp
     * @param $toTimestamp
     * @param array $users
     *
     * @return array
     */
    public function getReport($projectId, $fromTimestamp, $toTimestamp, Array $users = [])
    {
        return $this->reportApi->getReport($projectId, $fromTimestamp, $toTimestamp, $users);
    }

    /**
     * @param $projectId
     * @param array $users
     * @param $fromTimestamp
     * @param $toTimestamp
     *
     * @return mixed
     */
    public function getTimeEntries($projectId, Array $users, $fromTimestamp, $toTimestamp)
    {
        return $this->timeEntryApi->getTimeEntries($projectId, $users, $fromTimestamp, $toTimestamp);
    }

    /**
     * @param $projectId
     * @param $userId
     * @param $fromTimestamp
     * @param $toTimestamp
     *
     * @return mixed
     */
    public function getTimeEntriesForUser($projectId, $userId, $fromTimestamp, $toTimestamp)
    {
        return $this->timeEntryApi->getTimeEntriesForUser($projectId, $userId, $fromTimestamp, $toTimestamp);
    }

    /**
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getScreenshot($projectId, $timeEntryId)
    {
        return $this->timeEntryApi->getScreenshot($projectId, $timeEntryId);
    }

    /**
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getTimeEntry($projectId, $timeEntryId)
    {
        return $this->timeEntryApi->getTimeEntry($projectId, $timeEntryId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getTasksFromProject($projectId)
    {
        return $this->taskAssignmentApi->getTasksFromProject($projectId);
    }

    /**
     * @param $projectId
     * @param $taskAssignmentId
     *
     * @return mixed
     */
    public function getTaskFromProject($projectId, $taskAssignmentId)
    {
        return $this->taskAssignmentApi->getTaskFromProject($projectId, $taskAssignmentId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getUsersFromProject($projectId)
    {
        return $this->userAssignmentApi->getUsersFromProject($projectId);
    }

    /**
     * @param $projectId
     * @param $userAssignmentId
     *
     * @return mixed
     */
    public function getUserFromProject($projectId, $userAssignmentId)
    {
        return $this->userAssignmentApi->getUserFromProject($projectId, $userAssignmentId);
    }
}
