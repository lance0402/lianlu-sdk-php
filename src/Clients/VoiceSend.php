<?php
namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class VoiceSend{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "sms/voice/";

    /**
     * 提交语音任务
     * @param Credential $credential
     * @param models\Voice $voice
     * @return bool|string
     * @throws LianLuException
     */
    public static function TemplateSend(Credential $credential, models\Voice $voice)
    {
        $url = $credential->getBaseUrl().self::$prefix."send";
        $inputObj = new models\Voice();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($voice->GetPhoneNumberSet());
        $inputObj->SetTemplateId($voice->GetTemplateId());
        $inputObj->SetTemplateParamSet($voice->GetTemplateParamSet());

        if(@$voice->GetTaskTime()) {
            $inputObj->SetTaskTime($voice->GetTaskTime());
        }
        if(@$voice->GetTag()) {
            $inputObj->SetTag($voice->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 提交语音任务，SessionContext需先创建模板
     * @param Credential $credential
     * @param models\Voice $voice
     * @return bool|string
     * @throws LianLuException
     */
    public static function NormalSend(Credential $credential, models\Voice $voice)
    {
        $url = $credential->getBaseUrl().self::$prefix."normal/send";
        $inputObj = new models\Voice();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($voice->GetPhoneNumberSet());
        $inputObj->SetSessionContext($voice->GetSessionContext());

        if(@$voice->GetTaskTime()) {
            $inputObj->SetTaskTime($voice->GetTaskTime());
        }
        if(@$voice->GetTag()) {
            $inputObj->SetTag($voice->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}