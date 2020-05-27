<?php

namespace Demokn\Dianping;

use Demokn\Dianping\Core\Traits\HasHttpRequests;
use Psr\Http\Message\ResponseInterface;

class Client
{
    use HasHttpRequests {
        request as performRequest;
    }

    /**
     * The application instance.
     *
     * @var Application
     */
    protected $app;

    /**
     * @var string
     */
    protected $baseUri;

    public function __construct($app)
    {
        $this->app = $app;
    }

    protected function signature(array $params)
    {
        // 参数排序
        unset($params['sign']);
        ksort($params);

        // 把所有参数名和参数值串在一起
        $query = '';
        foreach ($params as $key => $value) {
            if ($key && $value) {
                $query .= $key.$value;
            }
        }

        // 使用MD5/HMAC加密
        if (isset($params['sign_method']) && $params['sign_method'] == 'HMAC') {
            $sign = hash_hmac('MD5', $query, $this->app['config']['app_secret']);
        } else {
            $sign = md5($this->app['config']['app_secret'].$query.$this->app['config']['app_secret']);
        }

        // 把二进制转化为小写的十六进制
        return strtolower($sign);
    }

    /**
     * GET request.
     *
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return \Psr\Http\Message\ResponseInterface|array
     *
     */
    public function httpGet(string $url, array $query = [], bool $withCommonParams = true)
    {
        if ($withCommonParams) {
            $query = array_merge($this->getCommonParams(), $query);
            $query['sign'] = $this->signature($query);
        }

        return $this->request($url, 'GET', ['query' => $query]);
    }

    /**
     * POST request.
     *
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return \Psr\Http\Message\ResponseInterface|array
     *
     */
    public function httpPost(string $url, array $data = [], bool $withCommonParams = true)
    {
        if ($withCommonParams) {
            $data = array_merge($this->getCommonParams(), $data);
            $data['sign'] = $this->signature($data);
        }

        return $this->request($url, 'POST', ['form_params' => $data]);
    }

    /**
     * @param bool $returnRaw
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return \Psr\Http\Message\ResponseInterface|array
     *
     */
    public function request(string $url, string $method = 'GET', array $options = [], $returnRaw = false)
    {
        $response = $this->performRequest($url, $method, $options);

        return $returnRaw ? $response : $this->castResponse($response);
    }

    private function getTimestamp()
    {
        $datetime = new \DateTime('now', new \DateTimeZone('GMT+8'));

        return $datetime->format('Y-m-d H:i:s');
    }

    protected function getCommonParams()
    {
        return [
            'app_key' => $this->app['config']['app_key'],
            'timestamp' => $this->getTimestamp(),
            'format' => 'json',
            'v' => 1,
            'sign_method' => 'MD5',
        ];
    }

    public function castResponse(ResponseInterface $response)
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
