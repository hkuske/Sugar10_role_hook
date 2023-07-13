<?php
class setDefaultRole
{
    public function setRole($bean, $event, $arguments)
    {
/**/	$GLOBALS['log']->fatal("ACL HOOK A = ".print_r($arguments,true));
/**/	$GLOBALS['log']->fatal("ACL HOOK A iu = ".$arguments['isUpdate']);
/**/	$GLOBALS['log']->fatal("ACL HOOK id = ".print_r($bean->id,true));
/**/	$GLOBALS['log']->fatal("ACL HOOK deleted = ".print_r($bean->deleted,true));
	   
	    if (($arguments['isUpdate'] != 1)&&($bean->deleted == 0)) {
			if (substr($bean->name,0,1)=='#') {
/**/			$GLOBALS['log']->fatal("ACL HOOK SHOULD DO STH.");		
				$query = "INSERT INTO acl_roles_users (id,role_id,user_id,date_modified,deleted) ".
				         "SELECT uuid(),'".$bean->id."',id,now(),0 ".
						 "FROM users WHERE deleted=0 AND Status='Active' AND is_admin=0";
				$conn = $GLOBALS['db']->getConnection(); 
/**/			$GLOBALS['log']->fatal("ACL HOOK query = ".$query);
				$stmt = $conn->executeQuery($query);
			}
		}
    }
}