<?php
// src/Umbrella/Worksnaps/Api/TimeEntryApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class TimeEntryApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class TimeEntryApi extends WorksnapsApi
{
    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param array $users
     * @param $fromTimestamp
     * @param $toTimestamp
     *
     * @return mixed
     */
    public function getTimeEntries($worksnapsApiKey, $projectId, Array $users, $fromTimestamp, $toTimestamp)
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
            "api/projects/$projectId/time_entries.xml",
            [
                'from_timestamp' => $fromTimestamp,
                'to_timestamp'   => $toTimestamp,
                'user_ids'       => $users,
            ]
        );

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }

    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $userId
     * @param $fromTimestamp
     * @param $toTimestamp
     *
     * @return mixed
     */
    public function getTimeEntriesForUser($worksnapsApiKey, $projectId, $userId, $fromTimestamp, $toTimestamp)
    {
        // prepare parameters
        $projectId     = (int)$projectId;
        $fromTimestamp = (int)$fromTimestamp;
        $toTimestamp   = (int)$toTimestamp;
        $userId        = (int)$userId;

        // build api endpoint
        $url = $this->buildEndpoint(
            "api/projects/$projectId/users/$userId/time_entries.xml",
            [
                'from_timestamp' => $fromTimestamp,
                'to_timestamp'   => $toTimestamp,
            ]
        );

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }

    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getScreenshot($worksnapsApiKey, $projectId, $timeEntryId)
    {
        // prepare parameters
        $projectId   = (int)$projectId;
        $timeEntryId = (int)$timeEntryId;

        // build api endpoint
        $url = $this->buildEndpoint(
            "api/projects/$projectId/time_entries/$timeEntryId.xml",
            [
                'full_resolution_url' => 1,
            ]
        );

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }

    /**
     * @param $worksnapsApiKey
     * @param $projectId
     * @param $timeEntryId
     *
     * @return mixed
     */
    public function getTimeEntry($worksnapsApiKey, $projectId, $timeEntryId)
    {
        // prepare parameters
        $projectId   = (int)$projectId;
        $timeEntryId = (int)$timeEntryId;

        // build api endpoint
        $url = $this->buildEndpoint("api/projects/$projectId/time_entries/$timeEntryId.xml");

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }
}
