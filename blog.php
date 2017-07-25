<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

#require_once('classes/Blog.php');

class blog extends Module
{
    public function __construct()
    {
        $this->name = 'blog';
        $this->tab = 'front_office_features';
        $this->version = '0.0.1';
        $this->author = 'Gaetan PRIOUR';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Blog');
        $this->description = $this->l('A simple blog module.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');


    }

    public function install()
    {
        if (Shop::isFeatureActive())
            Shop::setContext(Shop::CONTEXT_ALL);

        if (!parent::install())
            return false;

        require_once(dirname(__FILE__) . '/sql/install.php');
        if (!Db::getInstance()->Execute($sql))
            return false;

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall())
            return false;

        require_once(dirname(__FILE__) . '/sql/uninstall.php');
        if (!Db::getInstance()->Execute($sql))
            return false;

        return true;        
    }
}