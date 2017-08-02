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
            'created' => array(
                'type' => self::TYPE_DATE,
                'validate' => 'isString'
            ),
            'title' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isString'
            ),
            'description' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isString'
            ),
        ),
    );
}
