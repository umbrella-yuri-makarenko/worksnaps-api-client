<?php
// src/Umbrella/Worksnaps/Api/TaskAssignmentApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class TaskAssignmentApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class TaskAssignmentApi extends WorksnapsApi
{
    /**
     * @param $worksnapsApiKey
     * @param $projectId
     *
     * @return array
     */
    public function getTasksFromProject($worksnapsApiKey, $projectId)
    {
        // prepare parameters
        $projectId = (int)$projectId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/task_assignments.xml");

        // request Worksnaps API
        $data = $this->request($worksnapsApiKey, $url);

        // return data
        return (false === empty($data['task_assignment'])) ? $data['task_assignment'] : [];
    }

    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $taskAssignmentId
     *
     * @return mixed
     */
    public function getTaskFromProject($worksnapsApiKey, $projectId, $taskAssignmentId)
    {
        // prepare parameters
        $projectId        = (int)$projectId;
        $taskAssignmentId = (int)$taskAssignmentId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/task_assignments/$taskAssignmentId.xml");

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }
}