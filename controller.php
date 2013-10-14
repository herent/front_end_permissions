<?php

defined('C5_EXECUTE') or die("Access Denied.");

class FrontEndPermissionsPackage extends Package {

	protected $pkgHandle = "front_end_permissions";
	protected $appVersionRequired = "5.6.0";
	protected $pkgVersion = "0.2";

	public function getPackageName() {
		return t('Front End Permissions');
	}

	public function getPackageDescription() {
		return t('A container for front end permissions');
	}

	public function install() {
		$pkg = parent::install();

		$page = SinglePage::add('/dashboard/system/permissions/front_end', $pkg);
		$page->update(array(
		    'cName' => t('Front End Permissions'),
		    'cDescription' => t('Manage permissions for the front end of the site')
		));

		$pkc = PermissionKeyCategory::add('front_end', $pkg);
		foreach (array(
			'group',
			'user',
			'group_set',
			'group_combination',
			'page_owner'
		) as $handle) {
			$paet = PermissionAccessEntityType::getByHandle($handle);
			$pkc->associateAccessEntityType($paet);
		}
		PermissionKey::add("front_end", "front_end", t("Front End"), t("Let people do something on the front end"), false, false, $pkg);
	}

	public function upgrade() {
		
	}

	public function on_start() {
		
	}
}
