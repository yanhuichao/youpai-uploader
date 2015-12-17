<?php
class UpYun {
    const VERSION = '0.1';

    const ED_AUTO = 'v0.api.upyun.com';
    const ED_TELECOM = 'v1.api.upyun.com';
    const ED_CNC = 'v2.api.upyun.com';
    const ED_CTT = 'v3.api.upyun.com';

    private $_bucket_name;
    private $_form_api_secret;
    private $_expiration = 600;

    protected $endpoint;

    /**
     * 初始化 UpYun 存储接口
     * @param $bucket_name 空间名称
     * @param $form_api_secret 表单密钥
     * @return object
     */
    public function __construct($bucket_name, $form_api_secret, $endpoint, $expiration = 600) {
        $this->_bucket_name = $bucket_name;
        $this->_form_api_secret = $form_api_secret;
        $this->_expiration = $expiration;
        $this->endpoint = is_null($endpoint) ? self::ED_AUTO : $endpoint;
    }

    /**
     * 获取当前 SDK 版本号
     */
    public function version() {
        return self::VERSION;
    }

    /**
     * 生成 policy
     * @param $opts 一些配置参数
     * @return object
     */
    public function policyCreate($opts) {
        $options = array();
        $options['bucket'] = $this->_bucket_name;
        $options['expiration'] = time() + $this->_expiration;

        $options = array_merge($options, $opts);

        $policy = base64_encode(json_encode($options));
        return $policy;
    }

    /**
     * 生成 sign 
     * @return object
     */
    public function signCreate($opts) {
        $policy = $this->policyCreate($opts);
        $sign = md5($policy.'&'.$this->_form_api_secret);

        return $sign;
    }

    /**
     * 获取提交接口地址
     * @return object
     */
    public function action() {
        $action = 'http://' . $this->endpoint . '/' . $this->_bucket_name .'/';

        return $action;
    }
}
