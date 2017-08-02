<?php

class blogshowModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $dbquery = new DbQuery();
        $dbquery->select('`id_blog_post`, `title`, `description`, `created`');
        $dbquery->from('blog_post');
        $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($dbquery->build());

        $this->context->smarty->assign('posts', $posts);
        $this->setTemplate('blog_index.tpl');
    }
}