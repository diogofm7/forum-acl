<?php
namespace App\Http\views;


use App\Module;

class MenuViewComposer
{
    private $module;

    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    public function composer($view){

        $user = auth()->user();

        $modulesFiltered = session()->get('modules') ?: [];

        if(!$modulesFiltered){
            if ($user->isAdmin()){
                $modulesFiltered = $this->getModules($this->module);
            }else{

                $modules = $this->getModules($user->role->modules());

                foreach ($modules as $key => $module){
                    $modulesFiltered[$key]['name'] = $module->name;

                    foreach ($module->resources as $k => $resource){
                        if ($resource->roles->contains($user->role)){
                            $modulesFiltered[$key]['resources'][$k] = $resource;
                        }
                    }
                }
            }
            session()->put('modules', $modulesFiltered);
        }
        return $view->with(compact('modulesFiltered'));
    }

    public function getModules($modules)
    {
        return $modules->with(['resources' => function($q){
            return $q->where('is_menu', true);
        }])->get();
    }
}
