<?php

class BlogPost extends ObjectModel
{

    public $id_blog_post;
    public $created;
    public $title;
    public $description;
    public static $definition = array(
        'table' => 'blog_post',
        'primary' => 'id_blog_post',
        'fields' => array(
            'created' => array('type' => self::TYPE_DATE, 'validate' => 'isString'),
            'title' => array('type' => self::TYPE_STRING, 'validate' => 'isString'),
            'description' => array('type' => self::TYPE_STRING, 'validate' => 'isString')
        ),
    );

    // public function __construct($id = null, $id_lang = null, $id_shop = null)
    // {
    //     parent::__construct($id, $id_lang, $id_shop);
    // }


    // public function add($autodate = true, $null_values = false)
    // {
    //     if (!parent::add($autodate, $null_values))
    //         return false;
    //     return true;
    // }


}