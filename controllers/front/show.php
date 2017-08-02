<?php

class blogshowModuleFrontController extends ModuleFrontController
{
    /**
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $posts = $this->getPosts(Tools::getValue('id'));

        $this->context->smarty->assign('posts', $posts);
        $this->setTemplate('blog_index.tpl');
    }

    private function getPosts($id)
    {
        $dbquery = new DbQuery();
        $dbquery->select('`id_blog_post`, `title`, `description`, `created`');
        $dbquery->from('blog_post');
        if ($id !== false) {
            $dbquery->where('`id_blog_post` = ' . $id);
        }
        $posts = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($dbquery->build());

        if (!$posts) {
            return false;
        }

        $postsWithLink = [];
        foreach ($posts as $post) {
            $post['link'] =  $this->context->link->getModuleLink(
                'blog',
                'show',
                array('id' => $post['id_blog_post'])
            );
            $postsWithLink[] = $post;
        }

        return $postsWithLink;
    }
}
