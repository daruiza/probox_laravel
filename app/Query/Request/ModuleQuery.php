<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Module;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IModuleQuery;
use Carbon\Carbon;

class ModuleQuery implements IModuleQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $label  = 'label';
    private $active  = 'active';

    //Devuelve todos los modulos existentes
    public function index()
    {
       $modules = DB::table('modules')->get();

       return view('module.index', ['modules'-> $modules]);
    }

    //Crear un nuevo modulo
    public function store(Request $request)
    {
        try
        {
            $newModule = DB::table('modules')->insert(
                [
                    'name' => 'Projects',
                    'description' => 'Project object',
                    'label' => 'PP'
                ]
            );

            return response()->json([
                'data' => [
                    'module' => $newModule,
                ],
                'message' => 'Modulo creado correctamente!'
            ], 201);

        }catch (\Exception $e)
        {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
        
    }

    public function update(Request $request, int $id, string $name, string $description, string $label)
    {
        //$module = DB::table('modules')->where('id', $id)->first();
         try
         {
            $updateModule = DB::table('modules')->where('id', $id)->upsert
            ([
                ['name' => $name, 'description' => $description, 'label' => $label]
            ], ['name', 'description','label']);

            return response()->json([
                'data' =>
                [
                    'module' => $updateModule,
                ],
                    'message' => 'Modulo actualizado correctamente!'
            ], 201);
      
              }catch (\Exception $e)
              {
                  return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
              }
    }

    public function destroy(int $id)
    {
        $deleteModule = DB::table('modules')->where('id', $id)->delete();
    }

    public function showByModuleId(Request $request, int $id)
    {
        
    }
}
