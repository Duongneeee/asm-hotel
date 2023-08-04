<?php

function isRole($dataArr, $moduleName, $role = 'view')
{
    if (!empty($dataArr[$moduleName])) {
        $roleArr = $dataArr[$moduleName];
        if (!empty($roleArr) && in_array($role, $roleArr)) {
            return true;
        }
    }
    return false;
}

function getRole($user,$moduleName,$role){
    $roleJson = $user->role->permissions;

        if (!empty($roleJson)) {
            $roleArr = json_decode($roleJson, true);

            $check = isRole($roleArr, $moduleName,$role);

            return $check;
        }
        return false;
}
