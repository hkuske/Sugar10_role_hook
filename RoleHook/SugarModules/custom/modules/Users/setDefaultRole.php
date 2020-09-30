<?php

class setDefaultRole
{
    public function setRole($bean, $event, $arguments)
    {
//		$GLOBALS['log']->fatal("HOOK SET ROLE A = ".print_r($arguments,true));
		$GLOBALS['log']->fatal("HOOK SET ROLE A = ".$arguments['isUpdate']);
//		$GLOBALS['log']->fatal("HOOK SET ROLE B = ".print_r($bean,true));
		$GLOBALS['log']->fatal("HOOK id = ".print_r($bean->id,true));
		$GLOBALS['log']->fatal("HOOK deleted = ".print_r($bean->deleted,true));
		$GLOBALS['log']->fatal("HOOK acl_roles = ".print_r($bean->aclroles,true));
	   
	    if (($arguments['isUpdate'] != 1)&&($bean->deleted == 0)) {
			if (empty($bean->acl_roles)) {
				$GLOBALS['log']->fatal("HOOK SOLLTE HIER WAS TUN");
				
				$query = "INSERT INTO acl_roles_users (id,role_id,user_id,date_modified,deleted) ".
				         "SELECT uuid(),id, '".$bean->id."',now(),0 ".
						 "FROM acl_roles WHERE deleted=0 AND name like '#_%'";
				$conn = $GLOBALS['db']->getConnection(); 
				$stmt = $conn->executeQuery($query);
//				$GLOBALS['log']->fatal("DB result = ".print_r($stmt,true));
			}
		}
    }
}
