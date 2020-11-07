<?php
/**
 * uses:
 * @package Slides, A Slideshow Plugin for jQuery
 * Intructions: http://slidesjs.com
 * By: Nathan Searles, http://nathansearles.com
 *
 * slidesjs module entry point. essentially reuses code from the JaxStorm Black template,
 * by Hurricane Media to make the slideshow modular, and dynamic... corresponding to different joomla pages:
 * @subpackage Modules
 * @author scott heaton (scott.heaton@gmail.com)
 * @license GNU/GPL, see LICENSE.php
 * mod_slidesjs is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.framework', true);
$thisbaseurl = JURI::base();

$app = JFactory::getApplication();
$menu = $app->getMenu();
$menuItem = $menu->getActive();
$alias = $menuItem->alias; // returns homepage, if on homepage... or date, which is title of page

/* get my images gallery folder items into an array, based on date parameter which is in $alias above */
$dirname = 'images/gallery/cycling/';
$images = glob($dirname . $alias . "*.jpg"); /* originally was $images = glob($dirname."*.jpg") */
$max = sizeof($images);
//print_r($images);
//exit;

/* get slideshow images/dir into an array */

$slideshowparams = $app->getTemplate(true)->params;
$slideshowparams = $slideshowparams->toArray();
//print_r($slideshowparams);
//exit;

foreach ($slideshowparams as $key => $value)
{
    if ($key == 'slideseffect') { $slideseffect = $value; }
}

// include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

$thisoutput = modSlidesJsHelper::getSlides($alias);
require JModuleHelper::getLayoutPath('mod_slidesjs');
