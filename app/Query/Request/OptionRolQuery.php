<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\OptionRol;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IOptionRolQuery;


class OptionRolQuery implements IOptionRolQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $active  = 'active';
    private $id_rol = 'id_rol';
    private $id_option = 'id_option';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los modulos existentes
            $optionsrols = OptionRol::query()->select(['id', 'name', 'description', 'active', 'id_rol', 'id_option'])->get();

            return response()->json(['message' => $optionsrols]);
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
            $optionrol = new OptionRol([
                $this->name => $request->name,
                $this->description => $request->description,
                $this->active => $request->active,
                $this->id_rol => $request->id_rol,
                $this->id_option => $request->id_option,
            ]);
            $optionrol->save();
            
            return response()->json([
                'data' => [
                'optionrol' => $optionrol,
                ],
                'message' => 'OptionRol creado correctamente!'
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }
    }

    //Show: Obtener un registro de la tabla
    public function showByOptionRolId(Request $request,  int $id)
    {

        if ($id) {
            try {
                $opr = OptionRol::findOrFail($id);

                if ($opr) {
                    //Select a la BD: TB_modules
                    $optionrol = DB::table('options_rols')
                        ->select(['id', 'name', 'description', 'active', 'id_rol', 'id_option'])
                        ->where('options_rols.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'optionrol' => $optionrol,
                        ],
                        'message' => 'Datos de optionrol Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "OptionRol con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                $optionrol = OptionRol::findOrFail($id);
                //Actualización de datos
                $optionrol->name = $request->name ?? $optionrol->name;
                $optionrol->description = $request->description ?? $optionrol->description;
                $optionrol->active = $request->active ?? $optionrol->active;
                $optionrol->id_rol = $request->id_rol ?? $optionrol->id_rol;
                $optionrol->id_option = $request->id_option ?? $optionrol->id_option;
                $optionrol->save();

                return response()->json([
                    'data' => [
                        'optionrol' => $optionrol,
                    ],
                    'message' => 'OptionRol actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "OptionRol con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $optionrol = OptionRol::findOrFail($id);
                $optionrol->delete();
                return response()->json([
                    'data' => [
                        'optionrol' => $optionrol,
                    ],
                    'message' => 'OptionRol eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "OptionRol con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showOptionRolByRolId(Request $request, int $id_rol){

        if ($id_rol) {
            try {
                $opr = OptionRol::where('id_rol', '=', $id_rol)->firstOrFail();

                if (isset($opr)) {
                    //Select a la BD: TB_modules
                    $optionrol = DB::table('options_rols')
                        ->select(['id', 'name', 'description', 'active', 'id_rol', 'id_option'])
                        ->where('options_rols.id_rol', '=', $id_rol)
                        ->get();
                    return response()->json([
                        'data' => [
                            'optionrol' => $optionrol,
                        ],
                        'message' => 'Datos de OptionRol Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "OptionRol con id_rol {$id_rol} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showOptionRolByOptionId(Request $request, int $id_option){

        if ($id_option) {
            try {
                $opo = OptionRol::where('id_option', '=', $id_option)->firstOrFail();

                if ($opo) {
                    //Select a la BD: TB_modules
                    $optionrol = DB::table('options_rols')
                        ->select(['id', 'name', 'description', 'active', 'id_rol', 'id_option'])
                        ->where('options_rols.id_option', '=', $id_option)
                        ->get();
                    return response()->json([
                        'data' => [
                            'optionrol' => $optionrol,
                        ],
                        'message' => 'Datos de OptionRol Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "OptionRol con id_option {$id_option} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}