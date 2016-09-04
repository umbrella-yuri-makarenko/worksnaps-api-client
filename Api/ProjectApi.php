<?php
// src/Umbrella/Worksnaps/Api/ProjectApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class ProjectApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class ProjectApi extends WorksnapsApi
{
    /**
     * @return array
     */
    public function getProjects()
    {
        // build api endpoint
        $url = $this->buildEndpoint('api/projects.xml');

        // request Worksnaps API
        $data = $this->request($url);

        // return data
        return (false === empty($data['project'])) ? $data['project'] : [];
    }

    /**
     * @param $projectId
     *
     * @return mixed
     */
    public function getProject($projectId)
    {
        // prepare parameters
        $projectId = (int)$projectId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId.xml");

        // request Worksnaps API and return data
        return $this->request($url);
    }
}