<?php

namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class RCSSend
{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "rcs/";

    /**
     * 提交普通彩信任务
     * @param Credential $credential
     * @param models\RCS $rcs
     * @return bool|string
     * @throws LianLuException
     */
    public static function NormalSend(Credential $credential, models\RCS $rcs)
    {
        $url = $credential->getBaseUrl().self::$prefix."normal/send";
        $inputObj = new models\RCS();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($rcs->GetPhoneNumberSet());
        $inputObj->SetTemplateId($rcs->GetTemplateId());

        if(@$rcs->GetVersion()) {
            $inputObj->SetVersion($rcs->GetVersion());
        }
        if(@$rcs->GetTaskTime()) {
            $inputObj->SetTaskTime($rcs->GetTaskTime());
        }
        if(@$rcs->GetTag()) {
            $inputObj->SetTag($rcs->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 提交个性彩信任务
     * @param Credential $credential
     * @param models\RCS $rcs
     * @return bool|string
     * @throws LianLuException
     */
    public static function PersonalSend(Credential $credential, models\RCS $rcs)
    {
        $url = $credential->getBaseUrl().self::$prefix."personal/send";
        $inputObj = new models\RCS();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetTemplateParamSet($rcs->GetTemplateParamSet());
        $inputObj->SetTemplateId($rcs->GetTemplateId());

        if(@$rcs->GetVersion()) {
            $inputObj->SetVersion($rcs->GetVersion());
        }
        if(@$rcs->GetTaskTime()) {
            $inputObj->SetTaskTime($rcs->GetTaskTime());
        }
        if(@$rcs->GetTag()) {
            $inputObj->SetTag($rcs->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}