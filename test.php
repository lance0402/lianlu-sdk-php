<?php
require __DIR__ . '/vendor/autoload.php';

use Lianlu\Lianlu\Clients\InterSend;
use Lianlu\Lianlu\Clients\Product;
use Lianlu\Lianlu\Clients\RCSSend;
use Lianlu\Lianlu\Clients\SmsSend;
use Lianlu\Lianlu\Common\Credential;
use Lianlu\Lianlu\Common\LianLuException;
use Lianlu\Lianlu\Common\Utils;
use Lianlu\Lianlu\models\Balance;
use Lianlu\Lianlu\models\Inter;
use Lianlu\Lianlu\models\RCS;
use Lianlu\Lianlu\models\Sign;
use Lianlu\Lianlu\models\Sms;


$cred = new Credential("", "", "", "apis.shlianlu.com:9443");
try {
    $input = Product::Balance($cred);
    print_r($input);
} catch (LianLuException $e) {
}

//// getReport
////$input = new \Lianlu\Lianlu\models\Report();
////$input->SetTaskId("");
////try {
////    $result = Product::Report($cred, $input);
////
////    print_r($result);
////} catch (LianLuException $e) {
////}
//
//// send internal sms
//$input = new Inter();
//$input->SetPhoneNumberSet(["+447458196165"]);
//$input->SetTemplateId(10185);
//$input->SetTemplateParamSet(["1","2"]);
//$result = InterSend::Send($cred, $input);
//print($result);
// send normal sms
//$input = new Sms();
//$input->SetSessionContext("test");
//$input->SetPhoneNumberSet("15601862749");
//$input->SetSignName("【联麓信息】");
//$input->SetTag("1111");
//try {
//    $result = SmsSend::NormalSend($cred, $input);
//    print_r($result);
//} catch (LianLuException $e) {
//}

// send personal sms
//$input = new Sms();
//$input->SetSignName("【】");
//$input->SetSessionContextSet("{%1%}222");
//$input->SetContextParamSet([["号码", "变量"]]);
//
//try {
//    $result = SmsSend::PersonalSend($cred, $input);
//    print_r($result);
//} catch (LianLuException $e) {
//}

// send template sms
//$input = new Sms();
//$input->SetTemplateId(70004046);
//$input->SetPhoneNumberSet("15601862749");
//$input->SetTemplateParamSet(["121212"]);
//
//try {
//    $result = SmsSend::TemplateSend($cred, $input);
//    print_r($result);
//} catch (LianLuException $e) {
//}

// personal rcs
//$input = new RCS();
//$templateParam = [array("phone"=>"15601862749",
//    "param"=>["1","2"])];
//$input->SetTemplateId(10616);
//$input->SetTemplateParamSet($templateParam);
//try {
//    $result = RCSSend::PersonalSend($cred, $input);
//    print_r($result);
//} catch (LianLuException $e) {
//}
?>

