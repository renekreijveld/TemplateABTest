<?php
/**
 * @version       0.0.2
 * @package       TemplateABTest
 * @copyright     (C) 2017 DSD Business Internet
 * @license       GPL, http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

class plgSystemTemplateABTestInstallerScript
{
	public function preflight($type, $parent)
	{
		// Do version check only when installing the plugin
		if ($type != "discover_install" && $type != "install")
		{
			return true;
		}

		$app = JFactory::getApplication();

		$jversion = new JVersion();
		if (!$jversion->isCompatible('3.5.0'))
		{
			$app->enqueueMessage('Please upgrade to at least Joomla! 3.5.0 before continuing!', 'error');

			return false;
		}

		return true;
	}
}