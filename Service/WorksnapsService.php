<?php
// src/Umbrella/Worksnaps/Service/Worksnaps.php
namespace Umbrella\WorksnapsBundle\Service;

use Umbrella\WorksnapsBundle\Api\ProjectApi;
use Umbrella\WorksnapsBundle\Api\TaskApi;
use Umbrella\WorksnapsBundle\Api\UserAccountApi;
use Umbrella\WorksnapsBundle\Api\ReportApi;
use Umbrella\WorksnapsBundle\Api\TimeEntryApi;
use Umbrella\WorksnapsBundle\Api\TaskAssignmentApi;
use Umbrella\WorksnapsBundle\Api\UserAssignmentApi;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class WorksnapsService
 * @package Umbrella\WorksnapsBundle\Service
 */
class WorksnapsService
{
    use ContainerAwareTrait;

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
     */
    public function __construct()
    {
        $this->projectApi        = new ProjectApi();
        $this->taskApi           = new TaskApi();
        $this->userAccountApi    = new UserAccountApi();
        $this->reportApi         = new ReportApi();
        $this->timeEntryApi      = new TimeEntryApi();
        $this->taskAssignmentApi = new TaskAssignmentApi();
        $this->userAssignmentApi = new UserAssignmentApi();
    }

    /**
     * @return array
     */
    public function getProjects()
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->projectApi->getProjects( $worksnapsApiKey );
    }

    /**
     * @param $projectId
     *
     * @return mixed
     */
    public function getProject($projectId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->projectApi->getProject($worksnapsApiKey, $projectId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getTasks($projectId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->taskApi->getTasks($worksnapsApiKey, $projectId);
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
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->taskApi->getTask($worksnapsApiKey, $projectId, $taskId, $includeTaskAssignment);
    }

    /**
     * @return mixed
     */
    public function getMyUser()
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->userAccountApi->getMyUser($worksnapsApiKey);
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->userAccountApi->getUsers($worksnapsApiKey);
    }

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function getUser($userId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->userAccountApi->getUser($worksnapsApiKey, $userId);
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
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->reportApi->getReport($worksnapsApiKey, $projectId, $fromTimestamp, $toTimestamp, $users);
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
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->timeEntryApi->getTimeEntries($worksnapsApiKey, $projectId, $users, $fromTimestamp, $toTimestamp);
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
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->timeEntryApi->getTimeEntriesForUser($worksnapsApiKey, $projectId, $userId, $fromTimestamp, $toTimestamp);
    }

    /**
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getScreenshot($projectId, $timeEntryId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->timeEntryApi->getScreenshot($worksnapsApiKey, $projectId, $timeEntryId);
    }

    /**
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getTimeEntry($projectId, $timeEntryId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->timeEntryApi->getTimeEntry($worksnapsApiKey, $projectId, $timeEntryId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getTasksFromProject($projectId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->taskAssignmentApi->getTasksFromProject($worksnapsApiKey, $projectId);
    }

    /**
     * @param $projectId
     * @param $taskAssignmentId
     *
     * @return mixed
     */
    public function getTaskFromProject($projectId, $taskAssignmentId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->taskAssignmentApi->getTaskFromProject($worksnapsApiKey, $projectId, $taskAssignmentId);
    }

    /**
     * @param $projectId
     *
     * @return array
     */
    public function getUsersFromProject($projectId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->userAssignmentApi->getUsersFromProject($worksnapsApiKey, $projectId);
    }

    /**
     * @param $projectId
     * @param $userAssignmentId
     *
     * @return mixed
     */
    public function getUserFromProject($projectId, $userAssignmentId)
    {
        $worksnapsApiKey = $this->container->getParameter('worksnaps.api_key');
        return $this->userAssignmentApi->getUserFromProject($worksnapsApiKey, $projectId, $userAssignmentId);
    }
}
