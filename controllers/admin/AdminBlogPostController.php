<?php

class AdminBlogPostController extends ModuleAdminController
{
    public function __construct()
    {
        $this->table = 'blog_post';
        $this->className = 'BlogPost';
        $this->module = 'blog';
        $this->context = Context::getContext();
        $this->bootstrap = true;

        $this->fields_list = array(
            'id_blog_post' => array(
                'title' => $this->l('Id'),
                'width' => 50,
                'type' => 'text',
                'orderby' => true,
                'filter' => true,
                'search' => true
            ),
            'title' => array(
                'title' => $this->l('Title'),
                'width' => 440,
                'type' => 'text',
                'lang' => true,
                'orderby' => true,
                'filter' => true,
                'search' => true
            ),
            'created' => array(
                'title' => $this->l('Posted Date'),
                'width' => 100,
                'type' => 'date',
                'lang' => true,
                'orderby' => true,
                'filter' => true,
                'search' => true
            )
        );
        
        $this->fields_form = [
            'legend' => [
                'title' => $this->l('New Blog Entry'),
            ],
            'input'  => [
                'title'   => [
                    'type'     => 'text',
                    'label'    => $this->l('Title'),
                    'name'     => 'title',
                    'required' => true,
                ],
                'description'   => [
                    'type'     => 'text',
                    'label'    => $this->l('Description'),
                    'name'     => 'description',
                    'required' => true,
                ],
                'created'   => [
                    'type'     => 'date',
                    'label'    => $this->l('Date'),
                    'name'     => 'created'
                ]
            ],
            'submit' => [
                'title' => $this->l('Save'),
            ],
        ];
        parent::__construct();
    }

    public function renderList()
    {
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        return parent::renderList();
    }
}
