<?php
// src/Umbrella/Worksnaps/Api/WorksnapsApi.php
namespace Umbrella\WorksnapsBundle\Api;

use Umbrella\WorksnapsBundle\Exception\WorksnapsException;

/**
 * Class WorksnapsApi
 * @package Umbrella\WorksnapsBundle\Api
 */
abstract class WorksnapsApi
{
    /**
     * Worksnaps domain. This const used for build Worksnaps endpoints.
     */
    const WORKSNAPS_DOMAIN = 'https://api.worksnaps.com:443/';

    /**
     * build Worksnaps endpoint API url
     *
     * @param $uri
     * @param array $parameters
     *
     * @return string
     * @throws WorksnapsException
     */
    protected function buildEndpoint($uri, Array $parameters = [])
    {
        if (true === empty($uri)) {
            throw new WorksnapsException('uri parameter is required for buildEndpoint method');
        }

        $url = self::WORKSNAPS_DOMAIN.$uri;

        if (count($parameters) > 0) {
            // converts all array parameters to string with ';' delimiter
            foreach ($parameters as &$parameter) {
                if (is_array($parameter)) {
                    $parameter = implode(';', $parameter);
                }
            }

            // append query string to endpoint 
            $url .= '?'.http_build_query($parameters);
        }

        return $url;
    }

    /**
     * @param $worksnapsApiKey
     * @param $url
     *
     * @return array
     * @throws WorksnapsException
     */
    protected function request($worksnapsApiKey, $url)
    {
        if (true === empty($url)) {
            throw new WorksnapsException('url parameter is required for request method');
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERPWD, $worksnapsApiKey);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        return $this->parse($result);
    }

    /**
     * @param string $xmlString
     *
     * @return array
     * @throws WorksnapsException
     */
    private function parse($xmlString)
    {
        if (true === empty($xmlString)) {
            throw new WorksnapsException('response from Worksnaps API is empty');
        }

        $xml  = simplexml_load_string($xmlString);
        $json = json_encode($xml);

        $result = json_decode($json, true);

        $this->checkApiException($result);

        return $result;
    }

    /**
     * @param array $data
     *
     * @throws WorksnapsException
     */
    private function checkApiException(Array $data)
    {
        if (true === empty($data['error_code']) && true === empty($data['error_string'])) {
            return;
        }

        throw new WorksnapsException($data['error_string'], $data['error_code']);
    }
}
