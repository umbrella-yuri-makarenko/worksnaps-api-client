<?php
// src/Umbrella/Worksnaps/Api/TaskApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class TaskApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class TaskApi extends WorksnapsApi
{
    /**
     * @param $worksnapsApiKey
     * @param $projectId
     *
     * @return array
     */
    public function getTasks($worksnapsApiKey, $projectId)
    {
        // prepare parameters
        $projectId = (int)$projectId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/tasks.xml");

        // request Worksnaps API
        $data = $this->request($worksnapsApiKey, $url);

        // return data
        return (false === empty($data['task'])) ? $data['task'] : [];
    }

    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $taskId
     * @param bool $includeTaskAssignment
     *
     * @return mixed
     */
    public function getTask($worksnapsApiKey, $projectId, $taskId, $includeTaskAssignment = false)
    {
        // prepare parameters
        $projectId             = (int)$projectId;
        $taskId                = (int)$taskId;
        $includeTaskAssignment = (bool)$includeTaskAssignment;

        // build api endpoint
        $url = $this->buildEndpoint(
            "api/projects/$projectId/tasks/$taskId.xml",
            [
                'include_task_assignment' => (int)$includeTaskAssignment,
            ]
        );

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }
}
