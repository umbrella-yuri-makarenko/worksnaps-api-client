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
     * @return mixed
     */
    public function getMyUser()
    {
        // build api endpoint
        $url = $this->buildEndpoint('api/me.xml');

        // request Worksnaps API and return data
        return $this->request($url);
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        // build api endpoint
        $url = $this->buildEndpoint('api/users.xml');

        // request Worksnaps API
        $data = $this->request($url);

        // return data
        return (false === empty($data['user'])) ? $data['user'] : [];
    }

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function getUser($userId)
    {
        // prepare parameters
        $userId = (int)$userId;

        // build api endpoint
        $url = $this->buildEndpoint("api/users/$userId.xml");

        // return data
        return $this->request($url);
    }
}