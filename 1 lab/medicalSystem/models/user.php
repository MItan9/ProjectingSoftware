<?php
class User
{
    private $permissions;

    public function __construct($permissions = [])
    {
        $this->permissions = $permissions;
    }

    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions);
    }
}
?>
