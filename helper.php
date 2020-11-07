<?php
/**
 * @package Slides, A Slideshow Plugin for jQuery (used to cycle through images on joomla template)
 * Intructions: http://slidesjs.com
 * By: Nathan Searles, http://nathansearles.com
 * helper class for slidesjs module module
 * @subpackage Modules
 * @author scott heaton (scott.heaton@gmail.com)
 * @license GNU/GPL, see LICENSE.php
 * mod_slidesjs is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

class modSlidesJsHelper
{
    /**
     * outputs the div copied from index.php of template to output images/path, css / hmtl / php in default.php.
     * @access public
     */    
    public static function getSlides($alias)
    {
        if ($alias == 'homepage') { $_html = $alias; }
        else {
            $_html = 'nothome';
            return $_html;
        }
    }
}
