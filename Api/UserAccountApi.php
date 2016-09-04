<?php
// src/Umbrella/Worksnaps/Api/UserAccountApi.php
namespace Umbrella\WorksnapsBundle\Api;

/**
 * Class UserAccountApi
 * @package Umbrella\WorksnapsBundle\Api
 */
class UserAccountApi extends WorksnapsApi
{
    /**
     * @param $worksnapsApiKey
     *
     * @return mixed
     */
    public function getMyUser($worksnapsApiKey)
    {
        // build api endpoint
        $url = $this->buildEndpoint('api/me.xml');

        // request Worksnaps API and return data
        return $this->request($worksnapsApiKey, $url);
    }

    /**
     * @param $worksnapsApiKey
     *
     * @return array
     */
    public function getUsers( $worksnapsApiKey )
    {
        // build api endpoint
        $url = $this->buildEndpoint('api/users.xml');

        // request Worksnaps API
        $data = $this->request($worksnapsApiKey, $url);

        // return data
        return (false === empty($data['user'])) ? $data['user'] : [];
    }

    /**
     * @param $worksnapsApiKey
     * @param $userId
     *
     * @return mixed
     */
    public function getUser($worksnapsApiKey, $userId)
    {
        // prepare parameters
        $userId = (int)$userId;

        // build api endpoint
        $url = $this->buildEndpoint("api/users/$userId.xml");

        // return data
        return $this->request($worksnapsApiKey, $url);
    }
}