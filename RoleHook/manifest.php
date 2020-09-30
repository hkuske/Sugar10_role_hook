	<?php
/*********************************************************************************
 * 
 ********************************************************************************/
$manifest = array (
	'acceptable_sugar_versions' => array (
		'7.*.*',
		'8.*.*',
		'9.*.*',
		'10.*.*',
	),
	'acceptable_sugar_flavors' => array (
		'PRO',
		'ENT',
		'ULT',
	),
    'readme'=>'',
    'author' => 'Harald Kuske',
    'description' => 'set default role for new users',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'RoleHook',
    'published_date' => '2019-12-01',
    'type' => 'module',
    'version' => '0001',
);

$installdefs = array (
    'id' => 'RoleHook',
    'copy' =>
        array (
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
	),
);  
  
