<?php
defined('C5_EXECUTE') or die("Access Denied.");
$p = new Permissions();
if ($p->canAccessTaskPermissions()) {
	Loader::element('permission/details/front_end', array(), Package::getByHandle('front_end_permissions'));
}
