<?php

$hook_version = 1;
if (!isset($hook_array)) {
    $hook_array = array();
}

if (!isset($hook_array['after_save'])) {
    $hook_array['after_save'] = array();
}

$hook_array['after_save'][] = array(
    200,
    'after Role was saved',
    'custom/modules/ACLRoles/setDefaultRole.php',
    'setDefaultRole',
    'setRole'
);

//$GLOBALS['log']->fatal("ACL HOOK after_save = ".print_r($hook_array['after_save'],true));

