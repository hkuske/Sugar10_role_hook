<?php
class setDefaultRole
{
    public function setRole($bean, $event, $arguments)
    {
////	$GLOBALS['log']->fatal("USER HOOK A = ".print_r($arguments,true));
/**/	$GLOBALS['log']->fatal("USER HOOK A iu = ".$arguments['isUpdate']);
/**/	$GLOBALS['log']->fatal("USER HOOK id = ".print_r($bean->id,true));
/**/	$GLOBALS['log']->fatal("USER HOOK deleted = ".print_r($bean->deleted,true));
////	$GLOBALS['log']->fatal("USER HOOK acl_roles = ".print_r($bean->aclroles,true));
	   
	    if (($arguments['isUpdate'] != 1)&&($bean->deleted == 0)) {
			if (empty($bean->acl_roles)) {
				$GLOBALS['log']->fatal("USER HOOK SHOULD DO STH.");
				
				$query = "INSERT INTO acl_roles_users (id,role_id,user_id,date_modified,deleted) ".
				         "SELECT uuid(),id, '".$bean->id."',now(),0 ".
						 "FROM acl_roles WHERE deleted=0 AND name like '#%'";
				$conn = $GLOBALS['db']->getConnection(); 
/**/			$GLOBALS['log']->fatal("USER HOOK query = ".$query);
				$stmt = $conn->executeQuery($query);
			}
		}
    }
}
