<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Option;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IOptionQuery;


class OptionQuery implements IOptionQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $label  = 'label';
    private $active  = 'active';
    private $id_module = 'id_module';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los modulos existentes
            $options = Option::query()->select(['id', 'name', 'description', 'label', 'active', 'id_module'])->get();

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
            $this->name    => 'required|string|min:1|max:128|',
            $this->description   => 'required|string|min:1|max:128|',
            $this->label   => 'required|string|min:1|max:128|',
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
                $this->active => $request->active,
                $this->id_module => $request->id_module,
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
    public function showByOptionId(Request $request,  int $id)
    {

        if ($id) {
            try {
                $op = Option::findOrFail($id);

                if ($op) {
                    //Select a la BD: TB_modules
                    $option = DB::table('options')
                        ->select(['id', 'name', 'description', 'label', 'active', 'id_module'])
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
                $this->name    => 'required|string|min:1|max:128|',
                $this->description   => 'required|string|min:1|max:128|',
                $this->label   => 'required|string|min:1|max:128|',
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
                $option->active = $request->active ?? $option->active;
                $option->id_module = $request->id_module ?? $option->id_module;
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

    public function showOptionByModuleId(Request $request, int $id_module){

        if ($id_module) {
            try {
                $op = Option::findOrFail($id_module);

                if ($op) {
                    //Select a la BD: TB_modules
                    $option = DB::table('options')
                        ->select(['id', 'name', 'description', 'label', 'active', 'id_module'])
                        ->where('options.id_module', '=', $id_module)
                        ->get();
                    return response()->json([
                        'data' => [
                            'option' => $option,
                        ],
                        'message' => 'Datos de option Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Option con id_module {$id_module} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
