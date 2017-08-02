<?php

class blogindexModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign('message', 'foo');
        $this->setTemplate('blog_index.tpl');
    }
}
