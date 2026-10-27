<?php
namespace Lianlu\Lianlu\Clients;

use Lianlu\Lianlu\Common\Constants;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Request;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models;

class Product
{
    private static $version = Constants::Version;
    private static $SignType = Constants::MD5;

    private static $prefix = "sms/";

    /**
     * 获取余额
     * @return bool|string
     * @throws LianLuException
     * @var mixed
     */
    public static function Balance(Credential $credential)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/balance";
        $inputObj = new models\Balance();
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
     * 获取签名列表
     * @return bool|string
     * @throws LianLuException
     * @var mixed
     */
    public static function SignGet(Credential $credential)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/sign/get";
        $inputObj = new models\Sign();
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
     * 创建签名
     * @param Credential $credential
     * @param models\Sign $sign
     * @return bool|string
     * @throws LianLuException
     */
    public static function SignCreate(Credential $credential, models\Sign $sign)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/sign/create";
        $inputObj = new models\Sign();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetContent($sign->GetContent());
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetCreditCodeUrl($sign->GetCreditCodeUrl());
        $inputObj->SetIdCardBack($sign->GetIdCardBack());
        $inputObj->SetIdCardFront($sign->GetIdCardFront());

        if(@$sign->GetRemark()) {
            $inputObj->SetRemark($sign->GetRemark());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 获取模板列表
     * @return bool|string
     * @throws LianLuException
     * @var mixed
     */
    public static function TemplateGet(Credential $credential)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/template/get";
        $inputObj = new models\Template();
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
     * 获取模板
     * @return bool|string
     * @throws LianLuException
     * @var mixed
     */
    public static function TemplateGetById(Credential $credential, $TemplateId)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/template/getById";
        $inputObj = new models\Template();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTemplateId($TemplateId);
        $inputObj->SetTimeStamp(Utils::getMillisecond());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 创建短信模板
     * @param Credential $credential
     * @param models\Template $template
     * @return bool|string
     * @throws LianLuException
     */
    public static function SmsTemplateCreate(Credential $credential, models\Template $template)
    {
        $url = $credential->getBaseUrl().self::$prefix."product/template/create";
        $inputObj = new models\Template();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetContent($template->GetContent());
        $inputObj->SetTemplateName($template->GetTemplateName());
        $inputObj->SetSignId($template->GetSignId());
        $inputObj->SetTimeStamp(Utils::getMillisecond());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 创建语音模板
     * @param Credential $credential
     * @param models\Template $template
     * @return bool|string
     * @throws LianLuException
     */
    public static function VoiceTemplateCreate(Credential $credential, models\Template $template)
    {
        $url = $credential->getBaseUrl().self::$prefix."voice/template/create";
        $inputObj = new models\Template();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetSessionContext($template->GetSessionContext());
        $inputObj->SetTemplateType($template->GetTemplateType());
        $inputObj->SetTemplateName($template->GetTemplateName());
        $inputObj->SetTimeStamp(Utils::getMillisecond());

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 获取短信回执
     * @param Credential $credential
     * @param models\Report $report
     * @return bool|string
     * @throws LianLuException
     */
    public static function Report(Credential $credential, models\Report $report)
    {
        $url = $credential->getBaseUrl().self::$prefix."trade/report";
        $inputObj = new models\Report();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetTaskId($report->GetTaskId());

        if(@$report->GetPageNo()) {
            $inputObj->SetPageNo($report->GetPageNo());
        }
        if(@$report->GetPageSize()) {
            $inputObj->SetPageSize($report->GetPageSize());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }

    /**
     * 获取短信回复
     * @param Credential $credential
     * @param models\Report $report
     * @return bool|string
     * @throws LianLuException
     */
    public static function reply(Credential $credential, models\Report $report)
    {
        $url = $credential->getBaseUrl().self::$prefix."trade/reply";
        $inputObj = new models\Report();
        $inputObj->SetAppid($credential->GetAppId());
        $inputObj->SetMch_id($credential->GetMchId());
        $inputObj->SetSignType(self::$SignType);
        $inputObj->SetVersion(self::$version);
        $inputObj->SetTimeStamp(Utils::getMillisecond());
        $inputObj->SetTaskId($report->GetDate());

        if(@$report->GetPageNo()) {
            $inputObj->SetPageNo($report->GetPageNo());
        }
        if(@$report->GetPageSize()) {
            $inputObj->SetPageSize($report->GetPageSize());
        }

        $inputObj->SetSign($inputObj, $credential->getAppKey());
        $json = $inputObj->ToJson();
        return Request::postCurl($json, $url);
    }
}