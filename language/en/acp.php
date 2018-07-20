<?php

/**
* phpBB Extension - marttiphpbb calendarinput
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'ACP_MARTTIPHPBB_CALENDARINPUT_SETTINGS_SAVED'
		=> 'Settings have been saved successfully!',

// input_range

	'ACP_MARTTIPHPBB_CALENDARINPUT_LOWER_LIMIT_DAYS'				=> 'Lower limit when a event may start.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_LOWER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_MARTTIPHPBB_CALENDARINPUT_UPPER_LIMIT_DAYS'				=> 'Upper limit when a event may start.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_UPPER_LIMIT_DAYS_EXPLAIN'		=> 'Measured from now in days (value may be negative)',
	'ACP_MARTTIPHPBB_CALENDARINPUT_MIN_DURATION_DAYS'			=> 'Minimum duration of an event in days.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_MIN_DURATION_DAYS_EXPLAIN'	=> '',
	'ACP_MARTTIPHPBB_CALENDARINPUT_MAX_DURATION_DAYS'			=> 'Maximum duration of an event in days.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_MAX_DURATION_DAYS_EXPLAIN'	=> 'Must be longer than the minimum duration',

// input_format

// input_forums

	'ACP_MARTTIPHPBB_CALENDARINPUT_INPUT_FORUMS'			=> 'Input forums',
	'ACP_MARTTIPHPBB_CALENDARINPUT_INPUT_FORUMS_EXPLAIN'	=> 'Select which in forums topics can be calenda events.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_INPUT_FORUMS_ENABLED'	=> 'Enabled',
	'ACP_MARTTIPHPBB_CALENDARINPUT_INPUT_FORUMS_REQUIRED'	=> 'Required',

// include_assets

	'ACP_MARTTIPHPBB_CALENDARINPUT_DIRECTORY_LIST_FAIL'		=> 'Failed to list content of directory %s',
	'ACP_MARTTIPHPBB_CALENDARINPUT_INCLUDE_ASSETS'			=> 'Include assets',
	'ACP_MARTTIPHPBB_CALENDARINPUT_JQUERY_UI_DATEPICKER'
											=> 'Include jQuery UI Datepicker.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_JQUERY_UI_DATEPICKER_EXPLAIN'
											=> 'Disable when already included by another extension.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_JQUERY_UI_DATEPICKER_I18N'
											=> 'Include jQuery UI Datepicker i18n',
	'ACP_MARTTIPHPBB_CALENDARINPUT_JQUERY_UI_DATEPICKER_I18N_EXPLAIN'
											=> 'Disable when already included by another extension.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_DATEPICKER_THEME'			=> 'jQuery UI Datepicker theme',
	'ACP_MARTTIPHPBB_CALENDARINPUT_DATEPICKER_THEME_EXPLAIN'	=> 'Select none if another extension has already included one.',
	'ACP_MARTTIPHPBB_CALENDARINPUT_DATEPICKER_THEME_NONE'	=> '-- none --',
]);
