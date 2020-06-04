<?php

namespace Demokn\Dianping\Tuangou;

class Client extends \Demokn\Dianping\Client
{
    /**
     * 输码验券校验接口.
     * @link http://open.dianping.com/document/v2?docId=6000176&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function prepareReceipt(string $receiptCode, string $openShopUuid, string $session)
    {
        return $this->httpPost('router/tuangou/receipt/prepare', [
            'receipt_code' => $receiptCode,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
        ]);
    }

    /**
     * 验券接口.
     * @link http://open.dianping.com/document/v2?docId=6000177&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function consumeReceipt(string $requestId, string $receiptCode, int $count, string $openShopUuid, string $session, string $appShopAccount, string $appShopAccountName)
    {
        return $this->httpPost('router/tuangou/receipt/prepare', [
            'requestid' => $requestId,
            'receipt_code' => $receiptCode,
            'count' => $count,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
            'app_shop_account' => $appShopAccount,
            'app_shop_accountname' => $appShopAccountName,
        ]);
    }

    /**
     * 查询已验券信息.
     * @link http://open.dianping.com/document/v2?docId=6000178&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function getConsumedReceipt(string $receiptCode, string $openShopUuid, string $session)
    {
        return $this->httpGet('router/tuangou/receipt/getconsumed', [
            'receipt_code' => $receiptCode,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
        ]);
    }

    /**
     * 验券记录.
     * @param  int                                       $type
     * @param  int                                       $bizType
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function queryReceiptListByDate(string $openShopUuid, string $session, string $date, int $offset, int $limit, int $type = null, int $bizType = null)
    {
        $payload = [
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
            'date' => $date,
            'offset' => $offset,
            'limit' => $limit,
        ];
        if (!is_null($type)) {
            // 0=团购券, 1=非团购券, 默认为0
            $payload['type'] = $type;
        }
        if (!is_null($bizType)) {
            $payload['biz_type'] = $bizType;
        }

        return $this->httpGet('router/tuangou/receipt/querylistbydate', $payload);
    }

    /**
     * 撤销验券接口.
     * @link http://open.dianping.com/document/v2?docId=6000180&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function reverseConsumeReceipt(string $receiptCode, string $openShopUuid, string $session, string $appDealId, string $appShopAccount, string $appShopAccountName)
    {
        return $this->httpPost('router/tuangou/receipt/reverseconsume', [
            'app_deal_id' => $appDealId,
            'receipt_code' => $receiptCode,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
            'app_shop_account' => $appShopAccount,
            'app_shop_accountname' => $appShopAccountName,
        ]);
    }

    /**
     * 扫码验券校验接口.
     * @link http://open.dianping.com/document/v2?docId=6000181&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function scanPrepareReceipt(string $qrCode, string $openShopUuid, string $session)
    {
        return $this->httpPost('router/tuangou/receipt/scanprepare', [
            'qr_code' => $qrCode,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
        ]);
    }

    /**
     * 获取团购信息接口.
     * @link http://open.dianping.com/document/v2?docId=6000182&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function queryShopDeal(string $openShopUuid, string $session, int $offset = 1, int $limit = 100)
    {
        return $this->httpGet('tuangou/deal/queryshopdeal', [
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
            'offset' => $offset,
            'limit' => $limit,
        ]);
    }

    /**
     * 次卡批量验券接口.
     * @link http://open.dianping.com/document/v2?docId=6000521&rootDocId=5000
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @return array|\Psr\Http\Message\ResponseInterface
     */
    public function batchConsumeReceipt(string $requestId, array $receiptCodeInfos, string $openShopUuid, string $session, string $appShopAccount, string $appShopAccountName)
    {
        return $this->httpPost('router/tuangou/receipt/batchconsume', [
            'requestid' => $requestId,
            'open_shop_uuid' => $openShopUuid,
            'session' => $session,
            'app_shop_account' => $appShopAccount,
            'app_shop_accountname' => $appShopAccountName,
            'receipt_code_infos' => $receiptCodeInfos,
        ]);
    }
}
