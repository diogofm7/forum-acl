<?php
namespace App\Http\views;


class MenuViewComposer
{
    public function composer($view){

        $roleUser = auth()->user()->role;

        $modulesFiltered = [];

        foreach ($roleUser->modules as $key => $module){
            $modulesFiltered[$key]['name'] = $module->name;

            foreach ($module->resources as $resource){
                if ($resource->roles->contains($roleUser)){
                    $modulesFiltered[$key]['resources'][] = $resource;
                }
            }
        }

        return $view->with(compact('modulesFiltered'));
    }
}
