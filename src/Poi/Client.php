<?php

namespace Demokn\Dianping\Poi;

class Client extends \Demokn\Dianping\Client
{
    /**
     * POI搜索.
     * @link https://open.dianping.com/document/v2?docId=6000524&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function search(array $payload = [])
    {
        $payload = array_merge([
            'deviceId' => 'default',
        ], $payload);

        return $this->httpGet('router/poiinfo/commonsearch', $payload);
    }

    /**
     * POI店铺详情.
     * @link https://open.dianping.com/document/v2?docId=6000525&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function detail(array $payload = [])
    {
        $payload = array_merge([
            'deviceId' => 'default',
        ], $payload);

        return $this->httpGet('router/poiinfo/detailinfo', $payload);
    }
}
