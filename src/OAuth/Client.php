<?php

namespace Demokn\Dianping\OAuth;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 商家授权链接.
     * @link https://open.dianping.com/document/v2?docId=6000346&rootDocId=5000
     * @return string
     */
    public function getMerchantAuthUrl(string $redirectUrl, string $state = 'STATE')
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function code2Session(string $authCode = null, string $originalRedirectUrl = null)
    {
        return $this->httpPost('router/oauth/token', [
            'app_key' => $this->app->config->get('app_key'),
            'app_secret' => $this->app->config->get('app_secret'),
            'auth_code' => $authCode ?: $this->getAuthCode(),
            'grant_type' => 'authorization_code',
            'redirect_url' => $originalRedirectUrl ?: $this->getCurrentUrl(),
        ], false);
    }

    protected function getAuthCode()
    {
        return $this->app->request->get('auth_code');
    }

    protected function getCurrentUrl()
    {
        return $this->app->request->getSchemeAndHttpHost().$this->app->request->getPathInfo();
    }
}
