<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.plugin.plugin');

class  plgSystemTemplateABTest extends JPlugin
{

	public function onAfterRoute()
	{
		$app = JFactory::getApplication();
		if ($app->isAdmin()) return;

		$tmpl = 0;
		$templateA = $this->params->get('templatea', '');
		$templateB = $this->params->get('templateb', '');

		$session = JFactory::getSession();
		$tmplabtst = $session->get('tmplabtst');
		if ($tmplabtst)
		{
			$tmpl = $tmplabtst;
		}
		else
		{
			$random = rand(1, 2);
			if ($random == 1) $tmpl = $templateA;
			if ($random == 2) $tmpl = $templateB;			
			$session->set('tmplabtst', $tmpl);
		}

		// Get template parameters and apply it
		$tpl = $this->getTemplateById($tmpl);
		$this->_setTemplate($tpl->template);
		$app->getTemplate(true)->params = new JRegistry($tpl->params);
	}

	/**
	 * Get template info by providing its ID
	 * @param Integer $tplId
	 */
	private function getTemplateById($tplId)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
			->select($db->quoteName(array('id','template','params')))
			->from($db->quoteName('#__template_styles'))
			->where($db->quoteName('client_id') . ' = 0')
			->where($db->quoteName('id') . ' = ' . (int)$tplId);
		$db->setQuery($query);
		$template = $db->loadObject();
		if (!$template)
		{
			return false;
		}
		else
		{
			return $template;
		}
	}

	/**
	 * Set template that apply to the whole system
	 * @param object $tpl
	 */
	protected function _setTemplate($tpl = null)
	{
		if (empty($tpl))
		{
			return;
		}
		else
		{
			$app = JFactory::getApplication();
			$app->setTemplate($tpl);
		}
	}
}