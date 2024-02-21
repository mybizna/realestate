<?php

/** @var \Modules\Base\Classes\Fetch\Menus $this */

$this->add_module_info("realestate", [
    'title' => 'Real Estate',
    'description' => 'Real Estate', 
    'icon' => 'fas fa-house-user',
    'path' => '/realestate/admin/building',
    'class_str' => 'text-secondary border-secondary'
]);

$this->add_menu("realestate", "building", "Building", "/realestate/admin/building", "fas fa-cogs", 5);
$this->add_menu("realestate", "estate", "Estate", "/realestate/admin/estate", "fas fa-cogs", 5);
$this->add_menu("realestate", "region", "Region", "/realestate/admin/region", "fas fa-cogs", 5);
$this->add_menu("realestate", "town", "Town", "/realestate/admin/town", "fas fa-cogs", 5);
$this->add_menu("realestate", "unit", "Unit", "/realestate/admin/unit", "fas fa-cogs", 5);
$this->add_menu("realestate", "tenancy", "Tenancy", "/realestate/admin/tenancy", "fas fa-cogs", 5);
$this->add_menu("realestate", "reading", "Reading", "/realestate/admin/reading", "fas fa-cogs", 5);
$this->add_menu("realestate", "setting", "Setting", "/realestate/admin/setting", "fas fa-cogs", 5);

$this->add_submenu("realestate", "reading", "Reading Eletricity", "/realestate/admin/reading_eletricity", 5);
$this->add_submenu("realestate", "reading", "Reading Gas", "/realestate/admin/reading_gas", 5);
$this->add_submenu("realestate", "reading", "Reading Water", "/realestate/admin/reading_water", 5);

$this->add_submenu("realestate", "setting", "Building Unit Setup", "/realestate/admin/building_unit_setup", 5);
$this->add_submenu("realestate", "setting", "Unit Setup", "/realestate/admin/unit_setup", 5);

$this->add_submenu("realestate", "tenancy", "Tenancy", "/realestate/admin/tenancy", 5);
$this->add_submenu("realestate", "tenancy", "Tenancy Invoice", "/realestate/admin/tenancy_invoice", 5);
$this->add_submenu("realestate", "tenancy", "Tenancy Service", "/realestate/admin/tenancy_service", 5);
