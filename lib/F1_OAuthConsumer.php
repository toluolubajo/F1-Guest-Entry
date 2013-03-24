<?php

class F1_OAuthConsumer
{

    public $key;
    public $secret;
    public $callback_url;
    protected $_settings;

    function __construct($settings)
    {
        $this->_settings = (object) $settings;
        $this->key = $this->_settings->key;
        $this->secret = $this->_settings->secret;
        $this->callback_url = $this->_settings->callback_url;
    }

    function __toString()
    {
        return "OAuthConsumer[key=$this->key,secret=$this->secret]";
    }

    public function getSettings()
    {
        return $this->_settings;
    }

}