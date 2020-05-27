<?php

namespace Demokn\Dianping\Ugc;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 单一门店查询评论数据.
     * @link https://open.dianping.com/document/v2?docId=6000236&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function queryShopReview(array $payload)
    {
        return $this->httpPost('router/ugc/queryshopreview', $payload);
    }

    /**
     * 查询门店星级和单项分.
     * @link https://open.dianping.com/document/v2?docId=6000237&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function queryStar(array $payload)
    {
        return $this->httpPost('router/ugc/querystar', $payload);
    }
}
