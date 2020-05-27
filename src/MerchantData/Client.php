<?php

namespace Demokn\Dianping\MerchantData;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 消费数据.
     * @link https://open.dianping.com/document/v2?docId=6000230&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function consumption(array $payload)
    {
        return $this->httpPost('router/merchant/data/consumption', $payload);
    }

    /**
     * 团单消费详情.
     * @link https://open.dianping.com/document/v2?docId=6000231&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function dealGroupsConsumption(array $payload)
    {
        return $this->httpPost('router/merchant/data/dealgroups', $payload);
    }

    /**
     * 预约数
     * https://open.dianping.com/document/v2?docId=6000232&rootDocId=5000.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function booking(array $payload)
    {
        return $this->httpPost('router/merchant/data/book', $payload);
    }
}
