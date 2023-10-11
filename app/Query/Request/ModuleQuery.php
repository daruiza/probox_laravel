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


class ModuleQuery implements IModuleQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $label  = 'label';
    private $active  = 'active';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los modulos existentes
            $modules = Module::query()->select(['id', 'name', 'description', 'label', 'active'])->get();

            return response()->json(['message' => $modules]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    //Store: Guardar datos en la BD
    public function store(Request $request)
    {
        try {
            return response()->json(['message' => $request->input()]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e], 403);
        }
    }

    //Show: Obtener un registro de la tabla
    public function showByModuleId(Request $request,  int $id)
    {
        try {

            //*** Falta validar que $id sea valido para iniciar a operar con el


            $ml = Module::findOrFail($id);
            if ($ml) {
                $module = DB::table('modules')
                    ->select(['id', 'name', 'description', 'label', 'active'])
                    ->where('modules.id', '=', $id)
                    ->get();
                return response()->json([
                    'data' => [
                        'modules' => $module,
                    ],
                    'message' => 'Datos de modulos Consultados Correctamente!'
                ]);
            }
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "Modulo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
        }
    }

    //Update: Actualiza los datos en la BD
    public function update(Request $request, int $id)
    {
        if ($id) {
            try {
                //Consulta por Id
                $module = Module::findOrFail($id);
                //Rules: Especificaciones a validar
                $rules = [
                    $this->name    => 'required|string|min:1|max:128|',
                    $this->description   => 'required|string|min:1|max:128|',
                    $this->label   => 'required|string|min:1|max:128|',
                ];
                //Validación de rules
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
                //Actualización de datos
                $module->name = $request->name ?? $module->name;
                $module->description = $request->description ?? $module->description;
                $module->label = $request->label ?? $module->label;
                $module->active = $request->active ?? $module->active;
                $module->save();

                return response()->json([
                    'data' => [
                        'module' => $module,
                    ],
                    'message' => 'Modulo actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Modulo con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        } else {
            //*** Que pasa si no se recive el ID, deberia sacar un mensaje de errror
        }
    }

    //Destroy: Elimina un resgistro de la BD
    public function destroy(Request $request, int $id)
    {
        if ($id) {
            try {
                $module = Module::findOrFail($id);
                $module->delete();
                return response()->json([
                    'data' => [
                        'module' => $module,
                    ],
                    'message' => 'Modulo eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Modulo con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            //*** Que pasa si no se recive el ID, deberia sacar un mensaje de errror
        }
    }
}
