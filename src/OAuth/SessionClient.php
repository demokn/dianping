<?php

namespace Demokn\Dianping\OAuth;

use Demokn\Dianping\Client;

class SessionClient extends Client
{
    /**
     * session刷新.
     * @link https://open.dianping.com/document/v2?docId=6000342&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function refresh(string $refreshToken)
    {
        return $this->httpPost('router/oauth/token', [
            'app_key' => $this->app->config->get('app_key'),
            'app_secret' => $this->app->config->get('app_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
        ], false);
    }

    /**
     * session范围查询.
     * @link https://open.dianping.com/document/v2?docId=6000343&rootDocId=5000
     * @param $session
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function query(string $session)
    {
        return $this->httpGet('router/oauth/session/query', [
            'session' => $session,
        ]);
    }

    /**
     * session适用店铺查询.
     * @link https://open.dianping.com/document/v2?docId=6000344&rootDocId=5000
     * @param $session
     * @param $bid
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function scope(string $session, string $bid)
    {
        return $this->httpGet('router/oauth/session/scope', [
            'session' => $session,
            'bid' => $bid,
        ]);
    }
}
