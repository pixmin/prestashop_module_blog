<?php

class blog extends Module
{
    public function __construct()
    {
        $this->name = 'blog';
        $this->tab = 'front_office_features';
        $this->version = '0.0.1';
        $this->author = 'GP';
        $this->bootstrap = true;
        parent::__construct();

        $this->displayName = $this->l('Blog');
        $this->description = $this->l('Simple Blog module');
        $this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
    }

    public function install()
    {
        if (!parent::install()) {
            return false;
        }

        $sql = array();
        require_once(dirname(__FILE__) . '/sql/install.php');
        foreach ($sql as $sq) {
            if (!Db::getInstance()->Execute($sq)) {
                return false;
            }
        }

        $this->createBlogTabs();

        return true;
    }

    private function createBlogTabs()
    {
        $langs = Language::getLanguages();
        $tab = new Tab();
        $tab->class_name = "AdminBlogPost";
        $tab->module = "blog";
        $tab->id_parent = 0;
        foreach ($langs as $l) {
            $tab->name[$l['id_lang']] = $this->l('Blog');
        }
        $tab->save();
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        $this->removeTabs();

        $sql = array();
        require_once(dirname(__FILE__) . '/sql/uninstall.php');
        foreach ($sql as $s) {
            if (!Db::getInstance()->Execute($s)) {
                return false;
            }
        }

        return true;
    }

    public function removeTabs()
    {
        $tabid = Tab::getIdFromClassName("AdminBlogPost");
        if ($tabid) {
            $tab = new Tab($tabid);
            $tab->delete();
        }
    }
}
