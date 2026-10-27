<?php
namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class ShortLink{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "shortLink/";

    /**
     * 创建普通短链
     * @param Credential $credential
     * @param models\Short $short
     * @return bool|string
     * @throws LianLuException
     */
    public static function create(Credential $credential, models\Short $short)
    {
        $url = $credential->getBaseUrl().self::$prefix."create";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetShortName($short->GetShortName());
        $inputObj->SetUrl($short->GetUrl());
        $inputObj->SetDomain($short->GetDomain());
        $inputObj->SetAccessDeadline("0");

        if(@$short->GetAccessDeadline()) {
            $inputObj->SetAccessDeadline($short->GetAccessDeadline());
        }

        if(@$short->GetAccessPassword()) {
            $inputObj->SetAccessPassword($short->GetAccessPassword());
        }

        if(@$short->GetAccessTimes()) {
            $inputObj->SetAccessTimes($short->GetAccessTimes());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 创建号码跟踪
     * @param Credential $credential
     * @param models\Short $short
     * @return bool|string
     * @throws LianLuException
     */
    public static function batchCreate(Credential $credential, models\Short $short)
    {
        $url = $credential->getBaseUrl().self::$prefix."batchCreate";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetShortName($short->GetShortName());
        $inputObj->SetUrl($short->GetUrl());
        $inputObj->SetDomain($short->GetDomain());
        $inputObj->SetAccessDeadline("0");
        $inputObj->SetPhoneSet($short->GetPhoneSet());

        if(@$short->GetAccessDeadline()) {
            $inputObj->SetAccessDeadline($short->GetAccessDeadline());
        }

        if(@$short->GetAccessPassword()) {
            $inputObj->SetAccessPassword($short->GetAccessPassword());
        }

        if(@$short->GetAccessTimes()) {
            $inputObj->SetAccessTimes($short->GetAccessTimes());
        }

        if(@$short->GetId()) {
            $inputObj->SetId($short->GetId());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 删除短链
     * @param Credential $credential
     * @param models\Short $short
     * @return bool|string
     * @throws LianLuException
     */
    public static function delete(Credential $credential, models\Short $short)
    {
        $url = $credential->getBaseUrl().self::$prefix."delete";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetId($short->GetId());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 查询用户信息
     * @param Credential $credential
     * @return bool|string
     * @throws LianLuException
     */
    public static function queryInfo(Credential $credential)
    {
        $url = $credential->getBaseUrl().self::$prefix."queryInfo";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 查询访问明细
     * @param Credential $credential
     * @param models\Short $short
     * @return bool|string
     * @throws LianLuException
     */
    public static function queryAccess(Credential $credential, models\Short $short)
    {
        $url = $credential->getBaseUrl().self::$prefix."queryAccess";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetId($short->GetId());
        $inputObj->SetRows("100");
        $inputObj->SetOffset("1");

        if(@$short->GetRows()) {
            $inputObj->SetRows($short->GetRows());
        }

        if(@$short->GetOffset()) {
            $inputObj->SetOffset($short->GetOffset());
        }

        if(@$short->GetBrowser()) {
            $inputObj->SetBrowser($short->GetBrowser());
        }

        if(@$short->GetOs()) {
            $inputObj->SetOs($short->GetOs());
        }

        if(@$short->GetPlatform()) {
            $inputObj->SetPlatform($short->GetPlatform());
        }

        if(@$short->GetPhone()) {
            $inputObj->SetPhone($short->GetPhone());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 查询短链信息
     * @param Credential $credential
     * @param models\Short $short
     * @return bool|string
     * @throws LianLuException
     */
    public static function queryShortLink(Credential $credential, models\Short $short)
    {
        $url = $credential->getBaseUrl().self::$prefix."queryShortLink";
        $inputObj = new models\Short();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetId($short->GetId());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}