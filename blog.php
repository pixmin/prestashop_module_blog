<?php
/**
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author    PrestaShop SA <contact@prestashop.com>
 *  @copyright 2007-2015 PrestaShop SA
 *  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */
if (!defined('_PS_VERSION_'))
    exit;

require_once (dirname(__FILE__) . '/classes/BlogPost.php');

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

        if (!parent::install())
            return false;

        $sql = array();
        require_once(dirname(__FILE__) . '/sql/install.php');
        foreach ($sql as $sq) :
            if (!Db::getInstance()->Execute($sq))
                return false;
        endforeach;

        $this->CreateBlogTabs();

        return true;
    }
            
    public function uninstall()
    {
        if (!parent::uninstall())
            return false;

        $idtabs = array();

        require_once(dirname(__FILE__) . '/sql/uninstall_tab.php');
        foreach ($idtabs as $tabid):
            if ($tabid) {
                $tab = new Tab($tabid);
                $tab->delete();
            }
        endforeach;
        $sql = array();
        require_once(dirname(__FILE__) . '/sql/uninstall.php');
        foreach ($sql as $s) :
            if (!Db::getInstance()->Execute($s))
                return false;
        endforeach;

        return true;
    }


    private function CreateBlogTabs()
    {
        $langs = Language::getLanguages();
        $smarttab = new Tab();
        $smarttab->class_name = "AdminBlog";
        $smarttab->module = "";
        $smarttab->id_parent = 0;
        foreach ($langs as $l) {
            $smarttab->name[$l['id_lang']] = $this->l('Blog');
        }
        $smarttab->save();
        $tab_id = $smarttab->id;

        $tabvalue = array();
        // assign tab value from include file
        require_once(dirname(__FILE__) . '/sql/install_tab.php');
        foreach ($tabvalue as $tab) {
            $newtab = new Tab();
            $newtab->class_name = $tab['class_name'];
            if($tab['id_parent']==-1)
                    $newtab->id_parent = $tab['id_parent'];
                else
            $newtab->id_parent = $tab_id;

            $newtab->module = $tab['module'];
            foreach ($langs as $l) {
                $newtab->name[$l['id_lang']] = $this->l($tab['name']);
            }
            $newtab->save();
        }
        return true;
    }

    public function hookModuleRoutes($params)
    {
        $alias = 'blog';
        $usehtml = (int) Configuration::get('smartusehtml');
        $html = '.html';

        $my_link = array(
            'blog' => array(
                'controller' => 'category',
                'rule' => 'blog.html',
                'keywords' => array(),
                'params' => array(
                    'fc' => 'module',
                    'module' => 'smartblog'
                )
            )
        );

        $smartblogurlpattern = (int) Configuration::get('smartblogurlpattern');

        $my_link = array();

        switch ($smartblogurlpattern) {

            case 1:
                $my_link = $this->urlPatterWithoutId($alias, $html);
                break;
            case 2:
                $my_link = $this->urlPatterWithIdOne($alias, $html);
                break; 

            default:
                $my_link = $this->urlPatterWithIdOne($alias, $html);
        }
        // echo "<pre>";
        // print_r($my_link);

        return $my_link;
    }

}
