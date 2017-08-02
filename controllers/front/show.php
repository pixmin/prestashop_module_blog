<?php

class blogshowModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        // TODO: Fetch data
        $dbquery = new DbQuery();

        $this->context->smarty->assign('message', 'foo');
        $this->setTemplate('blog_index.tpl');
    }
}