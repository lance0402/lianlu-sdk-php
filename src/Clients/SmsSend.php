<?php
namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class SmsSend{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "sms/trade/";

    /**
     * 提交普通短信任务
     * @param Credential $credential
     * @param models\Sms $sms
     * @return bool|string
     * @throws LianLuException
     */
    public static function NormalSend(Credential $credential, models\Sms $sms)
    {
        $url = $credential->getBaseUrl().self::$prefix."normal/send";
        $inputObj = new models\Sms();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($sms->GetPhoneNumberSet());
        $inputObj->SetSignName($sms->GetSignName());
        $inputObj->SetSessionContext($sms->GetSessionContext());
        $inputObj->SetType("1");

        if(@$sms->GetVersion()) {
            $inputObj->SetVersion($sms->GetVersion());
        }
        if(@$sms->GetTaskTime()) {
            $inputObj->SetTaskTime($sms->GetTaskTime());
        }
        if(@$sms->GetTag()) {
            $inputObj->SetTag($sms->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 提交个性短信任务
     * @param Credential $credential
     * @param models\Sms $sms
     * @return bool|string
     * @throws LianLuException
     */
    public static function PersonalSend(Credential $credential, models\Sms $sms)
    {
        $url = $credential->getBaseUrl().self::$prefix."personal/send";
        $inputObj = new models\Sms();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetSessionContextSet($sms->GetSessionContextSet());
        $inputObj->SetSignName($sms->GetSignName());
        $inputObj->SetContextParamSet($sms->GetContextParamSet());
        $inputObj->SetType("2");

        if(@$sms->GetVersion()) {
            $inputObj->SetVersion($sms->GetVersion());
        }
        if(@$sms->GetTemplateId()) {
            $inputObj->SetTaskTime($sms->GetTaskTime());
        }

        if(@$sms->GetTaskTime()) {
            $inputObj->SetTaskTime($sms->GetTaskTime());
        }
        if(@$sms->GetTag()) {
            $inputObj->SetTag($sms->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 提交模板短信任务
     * @param Credential $credential
     * @param models\Sms $sms
     * @return bool|string
     * @throws LianLuException
     */
    public static function TemplateSend(Credential $credential, models\Sms $sms)
    {
        $url = $credential->getBaseUrl().self::$prefix."template/send";
        $inputObj = new models\Sms();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($sms->GetPhoneNumberSet());
        $inputObj->SetTemplateId($sms->GetTemplateId());
        $inputObj->SetTemplateParamSet($sms->GetTemplateParamSet());
        $inputObj->SetType("3");

        if(@$sms->GetSignId()) {
            $inputObj->SetSignId($sms->GetSignId());
        }

        if(@$sms->GetSignName()) {
            $inputObj->SetSignName($sms->GetSignName());
        }

        if(@$sms->GetVersion()) {
            $inputObj->SetVersion($sms->GetVersion());
        }
        if(@$sms->GetTaskTime()) {
            $inputObj->SetTaskTime($sms->GetTaskTime());
        }
        if(@$sms->GetTag()) {
            $inputObj->SetTag($sms->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}