<?php
namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class InterSend{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "sms/inter/";

    /**
     * 提交国际短信任务
     * @param Credential $credential
     * @param models\Inter $inter
     * @return bool|string
     * @throws LianLuException
     */
    public static function Send(Credential $credential, models\Inter $inter)
    {
        $url = $credential->getBaseUrl().self::$prefix."send";
        $inputObj = new models\Inter();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetPhoneNumberSet($inter->GetPhoneNumberSet());
        if(@$inter->GetSessionContext()) {
            $inputObj->SetSessionContext($inter->GetSessionContext());
        }
        else {
            $inputObj->SetTemplateId($inter->GetTemplateId());
            $inputObj->SetTemplateParamSet($inter->GetTemplateParamSet());

        }

        if(@$inter->GetTaskTime()) {
            $inputObj->SetTaskTime($inter->GetTaskTime());
        }
        if(@$inter->GetTag()) {
            $inputObj->SetTag($inter->GetTag());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}