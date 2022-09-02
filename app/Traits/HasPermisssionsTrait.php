<?php
namespace App\Traits;
use App\Models\Permission;
use App\Models\Role;
trait HasPermisssionsTrait{
//get permissions
  public function getAllPermissions($permission){
    return Permission::WhereIn('slug',$permission)->get();
  }
   
  public function hasPermission($permission){
    return (bool) $this->permissions->Where('slug',$permission->slug)->count();
  }
  

  public function hasRole(...$roles){
    foreach($roles as $role){
      if($this->roles->contains('slug',$slug)){
        return true;
      };
    }

    false;
  }

  public function hasPermissionThroughRole($permission){
   foreach($permission->rolea as $role){
    if($this->roles->contains($role)){
        return true;
      };
   }
   false;
  }

  public function permissions(){
    return $this->belongsTomany(Permission::class ,'users_permission');
  }

  public function roles(){
    return $this->belongsTomany(Role::class ,'users_roles');
  }
}