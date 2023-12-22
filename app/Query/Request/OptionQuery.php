<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Option;
use App\Model\Core\OptionRol;
use App\Model\Core\Module;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IOptionQuery;
use OpenApi\Annotations\Options;

class OptionQuery implements IOptionQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $label  = 'label';
    private $icon  = 'icon';
    private $active  = 'active';
    private $module_id = 'module_id';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los modulos existentes
            $options = Option::query()->select(['id', 'name', 'description', 'icon', 'label', 'active', 'module_id'])->get();

            return response()->json(['message' => $options]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    //Store: Guardar datos en la BD
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->name    => 'required|string|max:32',
            $this->description   => 'string|max:256',
            $this->label   => 'string|max:32',
            $this->icon   => 'string|max:32',
        ];
        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }

        try {
            //Recepción de datos y guardado en la BD
            $option = new Option([
                $this->name => $request->name,
                $this->description => $request->description,
                $this->label => $request->label,
                $this->icon => $request->icon,
                $this->active => $request->active,
                $this->module_id => $request->module_id,
            ]);
            $option->save();

            return response()->json([
                'data' => [
                    'option' => $option,
                ],
                'message' => 'Option creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }
    }

    //Show: Obtener un registro de la tabla
    public function showById(Request $request, int $id)
    {

        if ($id) {
            try {
                $op = Option::findOrFail($id);

                if ($op) {
                    //Select a la BD: TB_modules
                    $option = DB::table('options')
                        ->select(['id', 'name', 'description', 'label', 'icon', 'active', 'module_id'])
                        ->where('options.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'option' => $option,
                        ],
                        'message' => 'Datos de option Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Option con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    //Update: Actualiza los datos en la BD
    public function update(Request $request, int $id)
    {
        if ($id) {

            //Rules: Especificaciones a validar
            $rules = [
                $this->name    => 'required|string|max:32',
                $this->description   => 'string|max:256',
                $this->label   => 'string|max:32',
                $this->icon   => 'string|max:32',
            ];
            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
            }

            try {
                //Consulta por Id
                $option = Option::findOrFail($id);
                //Actualización de datos
                $option->name = $request->name ?? $option->name;
                $option->description = $request->description ?? $option->description;
                $option->label = $request->label ?? $option->label;
                $option->icon = $request->icon ?? $option->icon;
                $option->active = $request->active ?? $option->active;
                $option->module_id = $request->module_id ?? $option->module_id;
                $option->save();

                return response()->json([
                    'data' => [
                        'option' => $option,
                    ],
                    'message' => 'Option actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Option con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    //Destroy: Elimina un resgistro de la BD
    public function destroy(Request $request, int $id)
    {
        if ($id) {
            try {
                //Delete por id
                $option = Option::findOrFail($id);
                $option->delete();
                return response()->json([
                    'data' => [
                        'option' => $option,
                    ],
                    'message' => 'Option eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Option con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showModuleById(Request $request, int $id)
    {

        if ($id) {
            try {
                ////Comprobar existencia
                //$existencia = Option::find($id)->firstOrFail();
                //Consultar option
                $option = Option::find($id);
                //Aplicar relación
                $module = $option->module;

                return response()->json([
                    'data' => [
                        'module' => $module,
                    ],
                    'message' => 'Module consultado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Module relacionado a la option con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showRolById(Request $request, int $id)
    {

        if ($id) {
            try {
                //Comprobar existencia
                //$existencia = OptionRol::where('option_id', '=', $id)->firstOrFail();
                //Consultar option
                $option = Option::find($id);
                //Aplicar relación
                $rols = $option->rols;

                return response()->json([
                    'data' => [
                        'rols' => $rols,
                    ],
                    'message' => 'Rols consultados con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Rols relacionados a la Option con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
