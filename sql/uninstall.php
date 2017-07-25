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

$sql = array();
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_category`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_category_lang`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_category_shop`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_comment`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_comment_shop`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_media`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post_lang`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post_category`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post_related`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post_shop`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_product_related`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_tag`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_post_tag`';
$sql[] = 'DROP TABLE IF EXISTS  `' . _DB_PREFIX_ . 'smart_blog_imagetype`';
