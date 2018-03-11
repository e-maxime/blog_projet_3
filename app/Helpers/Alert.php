<?php
namespace App\Helpers;

class Alert
{
	public static function setAlert($msg, $type = 'success')
	{
		$_SESSION['alert'] = '<div class="alert alert-' . $type . '">' . $msg . '</div>';
	}

	public static function getAlert()
	{
		if (!empty($_SESSION)) {
            echo $_SESSION['alert'];
        }
        unset($_SESSION['alert']);
	}
}