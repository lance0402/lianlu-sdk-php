<?php

namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class Identify
{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "identification/";

    /**
     * 身份证二要素
     * @param Credential $credential
     * @param models\Identification $identification
     * * need SetName, SetIdNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function idCard2(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."idCard/auth";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetIdNum($identification->GetIdNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 身份证四要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetIdNum, SetStartTime, SetEndTime
     * @return bool|string
     * @throws LianLuException
     */
    public static function idCard4(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."idCard/auth/valid";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetIdNum($identification->GetIdNum());
        $inputObj->SetStartTime($identification->GetStartTime());
        $inputObj->SetEndTime($identification->GetEndTime());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 运营商二要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetPhone
     * @return bool|string
     * @throws LianLuException
     */
    public static function isp2(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."isp/auth";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetPhone($identification->GetPhone());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 运营商三要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetPhone, SetIdNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function isp3(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."isp/auth/three";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetPhone($identification->GetPhone());
        $inputObj->SetIdNum($identification->GetIdNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 运营商三要素详细版
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetPhone, SetIdNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function isp3d(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."isp/auth/three/detail";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetPhone($identification->GetPhone());
        $inputObj->SetIdNum($identification->GetIdNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 银行卡二要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetBankNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function bank2(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."bank/auth";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetBankNum($identification->GetBankNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 银行卡三要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetBankNum, SetIdNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function bank3(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."bank/auth/three";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetBankNum($identification->GetBankNum());
        $inputObj->SetIdNum($identification->GetIdNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 银行卡三要素详细版
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetBankNum, SetIdNum
     * @return bool|string
     * @throws LianLuException
     */
    public static function bank3d(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."bank/auth/three/detail";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetBankNum($identification->GetBankNum());
        $inputObj->SetIdNum($identification->GetIdNum());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 银行卡四要素
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetBankNum, SetIdNum, SetPhone
     * @return bool|string
     * @throws LianLuException
     */
    public static function bank4(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."bank/auth/four";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetBankNum($identification->GetBankNum());
        $inputObj->SetIdNum($identification->GetIdNum());
        $inputObj->SetPhone($identification->GetPhone());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 银行卡四要素详细版
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetName, SetBankNum, SetIdNum, SetPhone
     * @return bool|string
     * @throws LianLuException
     */
    public static function bank4d(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."bank/auth/four/detail";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetName($identification->GetName());
        $inputObj->SetBankNum($identification->GetBankNum());
        $inputObj->SetIdNum($identification->GetIdNum());
        $inputObj->SetPhone($identification->GetPhone());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 人像对比
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetImage, SetIdNum, SetName
     * @return bool|string
     * @throws LianLuException
     */
    public static function idMatch(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."idMatch";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetImage($identification->GetImage());
        $inputObj->SetIdNum($identification->GetIdNum());
        $inputObj->SetName($identification->GetName());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 号码实时查询
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetPhone
     * @return bool|string
     * @throws LianLuException
     */
    public static function phoneRealTime(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."phoneRealTime";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhone($identification->GetPhone());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 号码在网时长
     * @param Credential $credential
     * @param models\Identification $identification
     * need SetPhone
     * @return bool|string
     * @throws LianLuException
     */
    public static function phoneOnlineTime(Credential $credential, models\Identification $identification)
    {
        $url = $credential->getBaseUrl().self::$prefix."phoneOnlineTime";
        $inputObj = new models\Identification();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhone($identification->GetPhone());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}