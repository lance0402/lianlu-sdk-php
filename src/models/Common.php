<?php

namespace Lianlu\Lianlu\models;

use Lianlu\Lianlu\Common\Utils;

class Common extends Utils
{
    public function SetMch_id($value)
    {
        $this->values['MchId'] = $value;
    }
    public function GetMch_id()
    {
        return $this->values['MchId'];
    }
    public function SetMchId($value)
    {
        $this->values['MchId'] = $value;
    }
    public function GetMchId()
    {
        return $this->values['MchId'];
    }
    public function SetAppid($value)
    {
        $this->values['AppId'] = $value;
    }
    public function GetAppid()
    {
        return $this->values['AppId'];
    }
    public function SetVersion($value)
    {
        $this->values['Version'] = $value;
    }
    public function GetVersion()
    {
        return $this->values['Version'];
    }
    public function SetTimeStamp($value)
    {
        $this->values['TimeStamp'] = $value;
    }
    public function GetTimeStamp()
    {
        return $this->values['TimeStamp'];
    }

    public function GetSignType()
    {
        return $this->values['SignType'];
    }

    public function SetSignType($value)
    {
        $this->values['SignType'] = $value;
    }

    public function GetAppKey()
    {
        return $this->values['AppKey'];
    }

    public function SetAppKey($value)
    {
        $this->values['AppKey'] = $value;
    }

    public function GetTaskTime()
    {
        return $this->values['TaskTime'];
    }

    public function SetTaskTime($value)
    {
        $this->values['TaskTime'] = $value;
    }

    public function GetTag()
    {
        return $this->values['Tag'];
    }

    public function SetTag($value)
    {
        $this->values['Tag'] = $value;
    }
}
