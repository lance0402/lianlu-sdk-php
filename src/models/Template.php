<?php

namespace Lianlu\Lianlu\models;

class Template extends Common
{
    public function SetContent($value)
    {
        $this->values['content'] = $value;
    }
    public function GetContent()
    {
        return $this->values['content'];
    }

    public function SetSignId($value)
    {
        $this->values['SignId'] = $value;
    }
    public function GetSignId()
    {
        return $this->values['SignId'];
    }

    public function SetTemplateName($value)
    {
        $this->values['TemplateName'] = $value;
    }
    public function GetTemplateName()
    {
        return $this->values['TemplateName'];
    }

    public function SetTemplateType($value)
    {
        $this->values['TemplateType'] = $value;
    }
    public function GetTemplateType()
    {
        return $this->values['TemplateType'];
    }

    public function SetSessionContext($value)
    {
        $this->values['SessionContext'] = $value;
    }
    public function GetSessionContext()
    {
        return $this->values['SessionContext'];
    }

    public function SetTemplateId($value)
    {
        return $this->values['TemplateId'] = $value;
    }
    public function GetTemplateId()
    {
        return $this->values['TemplateId'];
    }
}
