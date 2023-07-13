	<?php
/*********************************************************************************
 * Link new role #* to all non admin users
 * Link all roles #* to new non admin users
 ' tested for version 7-13
 ********************************************************************************/
$manifest = array (
	'acceptable_sugar_versions' => array (
		'7.*.*',
		'8.*.*',
		'9.*.*',
		'10.*.*',
		'11.*.*',
		'12.*.*',
		'13.*.*',
	),
	'acceptable_sugar_flavors' => array (
		'PRO',
		'ENT',
		'ULT',
	),
    'readme'=>'',
    'author' => 'Harald Kuske',
    'description' => 'link default roles #* for new users',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'RoleHook',
    'published_date' => '2019-12-01',
    'type' => 'module',
    'version' => '0013',
);

$installdefs = array (
    'id' => 'RoleHook',
    'copy' =>
        array (
            array (
     		'from'=> '<basepath>/SugarModules/custom/modules/ACLRoles/setDefaultRole.php',
    	 	'to'=> 'custom/modules/ACLRoles/setDefaultRole.php',
            ),
            array (
     		'from'=> '<basepath>/SugarModules/custom/modules/Users/setDefaultRole.php',
    	 	'to'=> 'custom/modules/Users/setDefaultRole.php',
            ),
        ),
	'hookdefs' => array(
		array(
			'from' => '<basepath>/SugarModules/custom/Extension/modules/Users/Ext/LogicHooks/setDefaultRoleHook.php',
			'to_module' => 'Users',
		)
		array(
			'from' => '<basepath>/SugarModules/custom/Extension/modules/ACLRoles/Ext/LogicHooks/setDefaultRoleHook.php',
			'to_module' => 'ACLRoles',
		)
	),
);  
  
