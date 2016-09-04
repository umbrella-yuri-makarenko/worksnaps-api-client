<?php
// src/Umbrella/Worksnaps/Api/UserAssignmentApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class UserAssignmentApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class UserAssignmentApi extends WorksnapsApi
{
    /**
     * @param $projectId
     *
     * @return array
     */
    public function getUsersFromProject($projectId)
    {
        // prepare parameters
        $projectId = (int)$projectId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/user_assignments.xml");

        // request Worksnaps API
        $data = $this->request($url);

        // return data
        return (false === empty($data['user_assignment'])) ? $data['user_assignment'] : [];
    }

    /**
     * @param $projectId
     * @param $userAssignmentId
     *
     * @return mixed
     */
    public function getUserFromProject($projectId, $userAssignmentId)
    {
        // prepare parameters
        $projectId        = (int)$projectId;
        $userAssignmentId = (int)$userAssignmentId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/user_assignments/$userAssignmentId.xml");

        // request Worksnaps API and return data
        return $this->request($url);
    }
}