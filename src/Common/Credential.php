<?php
namespace Lianlu\Lianlu\Common;

class Credential
{
    private $mchId;

    private $appId;

    private $appKey;

    private $isHttp;

    private $endpoint;

    public function __construct($mchId, $appId, $appKey, $endpoint = Constants::DOMAIN_API, $isHttp = false){
        if (is_bool($endpoint)) {
            $isHttp = $endpoint;
            $endpoint = Constants::DOMAIN_API;
        }
        $this->mchId = $mchId;
        $this->appId = $appId;
        $this->appKey = $appKey;
        $this->endpoint = $endpoint;
        $this->isHttp = $isHttp;
    }

    /**
     * @return mixed
     */
    public function getMchId()
    {
        return $this->mchId;
    }

    /**
     * @param mixed $mchId
     */
    public function setMchId($mchId)
    {
        $this->mchId = $mchId;
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param mixed $appId
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
    }

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param mixed $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @return mixed
     */
    public function getIsHttp()
    {
        return $this->isHttp;
    }

    /**
     * @param mixed $isHttp
     */
    public function setIsHttp($isHttp)
    {
        $this->isHttp = $isHttp;
    }


    /**
     * @return mixed|string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * @param mixed|string $endpoint
     */
    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        $url = ($this->isHttp ? Constants::HTTP : Constants::HTTPS) . $this->endpoint;

        // 如果最后不是 / 则添加一个 /
        if (substr($url, -1) !== '/') {
            $url .= '/';
        }

        return $url;
    }

}
