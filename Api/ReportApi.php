<?php
// src/Umbrella/Worksnaps/Api/ReportApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class ReportApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class ReportApi extends WorksnapsApi
{
    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $fromTimestamp
     * @param $toTimestamp
     * @param array $users
     *
     * @return array
     */
    public function getReport($worksnapsApiKey, $projectId, $fromTimestamp, $toTimestamp, Array $users = [])
    {
        // prepare parameters
        $projectId     = (int)$projectId;
        $fromTimestamp = (int)$fromTimestamp;
        $toTimestamp   = (int)$toTimestamp;
        foreach ($users as &$user) {
            $user = (int)$user;
        }

        // build api endpoint
        $url = $this->buildEndpoint(
            "api/projects/$projectId/reports",
            [
                'name'           => 'time_entries',
                'from_timestamp' => $fromTimestamp,
                'to_timestamp'   => $toTimestamp,
                'user_ids'       => $users,
            ]
        );

        // request Worksnaps API
        $data = $this->request($worksnapsApiKey, $url);

        // return data
        return (false === empty($data['time_entry'])) ? $data['time_entry'] : [];
    }
}
