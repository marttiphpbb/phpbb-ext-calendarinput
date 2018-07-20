<?php
/**
* phpBB Extension - marttiphpbb calendarinput
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\calendarinput\acp;

use marttiphpbb\calendarinput\util\cnst;

class main_module
{
	var $u_action;

	function main($id, $mode)
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');
		$template = $phpbb_container->get('template');
		$config = $phpbb_container->get('config');
		$request = $phpbb_container->get('request');
		$phpbb_root_path = $phpbb_container->getParameter('core.root_path');

		$language->add_lang('acp', cnst::FOLDER);
		add_form_key(cnst::FOLDER);

		$store = $phpbb_container->get('marttiphpbb.calendarinput.store');

		switch($mode)
		{
			case 'range':

				$this->tpl_name = 'range';
				$this->page_title = $language->lang(cnst::L_ACP . '_RANGE');

//				$input_range = $phpbb_container->get('marttiphpbb.calendarinput.render.input_range');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$store->transaction_start();
					$store->set_lower_limit_days($request->variable('lower_limit_days', 0));
					$store->set_upper_limit_days($request->variable('upper_limit_days', 0));
					$store->set_min_duration_days($request->variable('min_duration_days', 0));
					$store->set_max_duration_days($request->variable('max_duration_days', 0));
					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'LOWER_LIMIT_DAYS'	=> $store->get_lower_limit_days(),
					'UPPER_LIMIT_DAYS'	=> $store->get_upper_limit_days(),
					'MIN_DURATION_DAYS'	=> $store->get_min_duration_days(),
					'MAX_DURATION_DAYS'	=> $store->get_max_duration_days(),
				]);

//				$input_range->assign_template_vars();

			break;

			case 'format':

				$this->tpl_name = 'format';
				$this->page_title = $language->lang(cnst::L_ACP . '_FORMAT');

				$input_range = $phpbb_container->get('marttiphpbb.calendarinput.input_range');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$settings->set_lower_limit_days($request->variable('lower_limit_days', 0));
					$settings->set_upper_limit_days($request->variable('upper_limit_days', 0));
					$settings->set_min_duration_days($request->variable('min_duration_days', 0));
					$settings->set_max_duration_days($request->variable('max_duration_days', 0));

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}



				$input_range->assign_template_vars();

			break;

			case 'forums':

				$this->tpl_name = 'forums';
				$this->page_title = $language->lang(cnst::L_ACP . '_FORUMS');

				$cforums = make_forum_select(false, false, false, false, true, false, true);

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$enabled_ary = $request->variable('enabled', [0 => 0]);
					$required_ary = $request->variable('required', [0 => 0]);

					$store->transaction_start();

					foreach ($cforums as $forum)
					{
						$forum_id = $forum['forum_id'];

						$store->set_enabled($forum_id, isset($enabled_ary[$forum_id]));
						$store->set_required($forum_id, isset($required_ary[$forum_id]));
					}

					$store->transaction_end();

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				if (sizeof($cforums))
				{
					foreach ($cforums as $forum)
					{
						$forum_id = $forum['forum_id'];

						$template->assign_block_vars('cforums', [
							'NAME'		=> $forum['padding'] . $forum['forum_name'],
							'ID'		=> $forum_id,
							'ENABLED'	=> $store->get_enabled($forum_id),
							'REQUIRED'	=> $store->get_required($forum_id),
						]);
					}
				}

			break;

			case 'placement':

				$this->tpl_name = 'placement';
				$this->page_title = $language->lang(cnst::L_ACP . '_PLACEMENT');

				if ($request->is_set_post('submit'))
				{
					if (!check_form_key(cnst::FOLDER))
					{
						trigger_error('FORM_INVALID');
					}

					$before = $request->variable('placement_before', 0);
					$store->set_placement_before($before ? true : false);

					trigger_error($language->lang(cnst::L_ACP . '_SETTINGS_SAVED') . adm_back_link($this->u_action));
				}

				$template->assign_vars([
					'S_PLACEMENT_BEFORE'	=> $store->get_placement_before(),
				]);

			break;
		}

		$template->assign_var('U_ACTION', $this->u_action);
	}
}
