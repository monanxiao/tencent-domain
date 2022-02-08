<?php

use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Common\Exception\TencentCloudSDKException;

/**
 * 域名操作相关
 * 
 */
use TencentCloud\Domain\V20180808\DomainClient;
use TencentCloud\Domain\V20180808\Models\DescribeDomainPriceListRequest;// 域名价格列表
use TencentCloud\Domain\V20180808\Models\DescribeDomainNameListRequest;// 我的域名列表
use TencentCloud\Domain\V20180808\Models\RenewDomainBatchRequest;// 批量域名续费

/**
 * DNSPod 相关
 * 
 */
use TencentCloud\Dnspod\V20210323\DnspodClient;
use TencentCloud\Dnspod\V20210323\Models\DescribeDomainListRequest;
use TencentCloud\Dnspod\V20210323\Models\CreateDomainRequest;

/**
 * DNSPod 添加域名
 * Domain 类型 String  添加域名
 * 
 */
function domain_list_create($domain){
    try {

        $cred = new Credential(config('services.tencent.SecretId'), config('services.tencent.SecretKey'));
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint("dnspod.tencentcloudapi.com");
          
        $clientProfile = new ClientProfile();
        $clientProfile->setHttpProfile($httpProfile);
        $client = new DnspodClient($cred, "", $clientProfile);
    
        $req = new CreateDomainRequest();
        
        $params = array(
            'Domain' => $domain
        );
        
        $req->fromJsonString(json_encode($params));
    
        $resp = $client->CreateDomain($req);
    
        return $resp;
    }
    catch(TencentCloudSDKException $e) {
        return $e;
    }
}


/**
 * DNSPod 获取域名列表
 * 
 */
function domain_list_record()
{
    try {

        $cred = new Credential(config('services.tencent.SecretId'), config('services.tencent.SecretKey'));
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint("dnspod.tencentcloudapi.com");
          
        $clientProfile = new ClientProfile();
        $clientProfile->setHttpProfile($httpProfile);
        $client = new DnspodClient($cred, "", $clientProfile);
    
        $req = new DescribeDomainListRequest();
        
        $params = array(
    
        );
        $req->fromJsonString(json_encode($params));
    
        $resp = $client->DescribeDomainList($req);
    
        return $resp;

    }
    catch(TencentCloudSDKException $e) {
        return $e;
    }

}


/**
 * 批量域名续费
 * 续费年限 类型 Integer period
 * 需要续费的域名 类型 array domain 
 * 付款方式 类型  Integer paymode： 0 在线付款 1 使用余额
 */
function domain_list_renew($domain, $period=1, $paymode=0)
{
    try {

        $cred = new Credential(config('services.tencent.SecretId'), config('services.tencent.SecretKey'));
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint("domain.tencentcloudapi.com");
          
        $clientProfile = new ClientProfile();
        $clientProfile->setHttpProfile($httpProfile);
        $client = new DomainClient($cred, "", $clientProfile);
    
        $req = new RenewDomainBatchRequest();
        
        $params = array(
            'Period' => $period,
            'Domains' => $domain,
            'PayMode' => $paymode
        );

        $req->fromJsonString(json_encode($params));
    
        $resp = $client->RenewDomainBatch($req);
    
        return $resp;
    }
    catch(TencentCloudSDKException $e) {
        return $e;
    }
}


/**
 * 我的域名列表
 * 
 */
function domain_list_user()
{
    try {

        $cred = new Credential(config('services.tencent.SecretId'), config('services.tencent.SecretKey'));
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint("domain.tencentcloudapi.com");
          
        $clientProfile = new ClientProfile();
        $clientProfile->setHttpProfile($httpProfile);
        $client = new DomainClient($cred, "", $clientProfile);
    
        $req = new DescribeDomainNameListRequest();
        
        $params = array(
    
        );
        $req->fromJsonString(json_encode($params));
    
        $resp = $client->DescribeDomainNameList($req);
    
        return $resp;
    }
    catch(TencentCloudSDKException $e) {
        return $e;
    }

}

/**
 * 域名价格列表
 * 
 */
function domain_list_price()
{
    try {

        $cred = new Credential(config('services.tencent.SecretId'), config('services.tencent.SecretKey'));
        $httpProfile = new HttpProfile();
        $httpProfile->setEndpoint("domain.tencentcloudapi.com");
          
        $clientProfile = new ClientProfile();
        $clientProfile->setHttpProfile($httpProfile);
        $client = new DomainClient($cred, "", $clientProfile);
    
        $req = new DescribeDomainPriceListRequest();
        
        $params = array(
    
        );
        $req->fromJsonString(json_encode($params));
    
        $resp = $client->DescribeDomainPriceList($req);
        
        return $resp;
    }
    catch(TencentCloudSDKException $e) {

       return $e;
    }
}