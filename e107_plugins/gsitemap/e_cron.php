<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2009 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Plugin configuration module - gsitemap
 *
 * $Source: /cvs_backup/e107_0.8/e107_plugins/gsitemap/e_cron.php,v $
 * $Revision$
 * $Date$
 * $Author$
 *
*/

if (!defined('e107_INIT')) { exit; }
/*if(!plugInstalled('gsitemap'))
{ 
	return;
}*/


class gsitemap_cron // include plugin-folder in the name.
{
	function config()
	{
		global $pref;
		
		$cron = array();
	
		$cron[] = array(
			'name'			=> "Update Records",
			'function'		=> "myfunction",
			'category'		=> '',
			'description' 	=> "Dummy example."
		);	
	
		$cron[] = array(
			'name'			=> "Test Email",
			'function'		=> "sendEmail",
			'category'		=> 'mail', // mail, user, content, notify, backup
			'description' 	=> "Sends a test email to ".$pref['siteadminemail']
		);		
		
		return $cron;
	}
	
	

	function myfunction() 
	{
	    // Whatever code you wish.
	    e107::getMessage()->add("Executed dummy function within gsitemap/e_cron.php");
	    return ;
	}
	
	
	
	function sendEmail()
	{
		global $pref;
	    require_once(e_HANDLER."mail.php");
		$message = "Your Cron Job worked correctly. Sent at ".date("r").".";
	    sendemail($pref['siteadminemail'], "e107 - TEST Email Sent by cron.".date("r"), $message, $pref['siteadmin'],$pref['siteadminemail'], $pref['siteadmin']);
	}
}



?>