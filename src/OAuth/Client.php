<?php

namespace Demokn\Dianping\OAuth;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 商家授权链接.
     * @link https://open.dianping.com/document/v2?docId=6000346&rootDocId=5000
     * @param $redirectUrl
     * @param $state
     * @return string
     */
    public function getMerchantAuthUrl($redirectUrl, $state)
    {
        $queries = [
            'app_key' => $this->app->config->get('app_key'),
            'redirect_url' => $redirectUrl,
            'state' => $state,
        ];

        return 'https://e.dianping.com/dz-open/merchant/auth?'.http_build_query($queries);
    }

    /**
     * session换取.
     * @link https://open.dianping.com/document/v2?docId=6000341&rootDocId=5000
     * @param  null                                      $redirectUrl
     * @param  null                                      $code
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function code2Session($redirectUrl = null, $code = null)
    {
        return $this->httpPost('router/oauth/token', [
            'app_key' => $this->app->config->get('app_key'),
            'app_secret' => $this->app->config->get('app_secret'),
            'auth_code' => $code ?: $this->getCode(),
            'grant_type' => 'authorization_code',
            'redirect_url' => $redirectUrl,
        ], false);
    }

    protected function getCode()
    {
        return $this->app->request->get('auth_code');
    }
}
