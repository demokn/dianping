<?php

namespace Demokn\Dianping\Book;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 用户到店核销接口.
     * @link http://open.dianping.com/document/v2?docId=6000203&rootDocId=1000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function isvConsume(array $payload)
    {
        return $this->httpPost('router/book/isvconsume', $payload);
    }
}
