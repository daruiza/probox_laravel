<?php

namespace App\Query\Request;

use App\Option;
use App\Model\Admin\Module;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Query\Abstraction\IOptionQuery;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OptionQuery implements IOptionQuery
{
    private $name = 'name';
    private $description   = 'description';
    private $label      = 'label';
    private $active      = 'active';    
    private $module_id     = 'module_id';

    public function index(Request $request)
    {
        $option = Option::query()
            ->select(['id', 'name', 'description', 'label', 'active', 'module_id'])
            ->where('module_id', '!=', 1)
            ->where('id', '!=', $request->option()->id)
            ->with(['module:id,name,description,label,active'])
            //->with(['commerce:id,name,nit,user_id'])
            ->name($request->name)
            ->description($request->description)
            ->label($request->label)
            ->active($request->active)
            ->module_id($request->module_id)
            ->responsible_id($request->option()->module_id)
            ->orderBy('id', $request->sort ?? 'DESC')
            ->paginate($request->limit ?? 8, ['*'], '', $request->page ?? 1);

        return response()->json([
            'data' => [
                'options' => $option,                
            ],
            'message' => 'Options consultados correctamente!'
        ], 200);
    }

    public function store(Request $request)
    {
       
    }

    public function update(Request $request)
    {
    }

    public function updateById(Request $request, Int $id)
    {
       
    }

    public function showByUserId(Request $request, $id)
    {
       
    }

    public function showByRolId(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        
    }
}
