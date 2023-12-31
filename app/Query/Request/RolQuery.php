<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Rol;
use App\Model\Core\OptionRol;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IRolQuery;


class RolQuery implements IRolQuery
{
    private $name   = 'name';
    private $description = 'description';
    private $active  = 'active';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los modulos existentes
            $roles = Rol::query()->select(['id', 'name', 'description', 'active'])->get();

            return response()->json(['message' => $roles]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
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
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
        }

        try {
            //Recepción de datos y guardado en la BD
            $rol = new Rol([
                $this->name => $request->name,
                $this->description => $request->description,
                $this->active => $request->active,
            ]);
            $rol->save();

            return response()->json([
                'data' => [
                    'rol' => $rol,
                ],
                'message' => 'Rol creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
        }
    }

    //Show: Obtener un registro de la tabla
    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $rl = Rol::findOrFail($id);
                $name = 'card';
                if ($rl) {
                    //Select a la BD: TB_rols
                    $rol = Rol::query()
                        ->select(['id', 'name', 'description', 'active'])
                        ->where('rols.id', '=', $id)
                        ->with(['options'])
                        // relacion interna
                        // ->with(['options' => function ($query) use ($name) {
                        //     return isset($name) ?
                        //         $query->where('options_rols.name', $name) :
                        //         $query;
                        // }])
                        ->get();
                    return response()->json([
                        'data' => [
                            'rol' => $rol,
                        ],
                        'message' => 'Datos de rol Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Rol con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
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
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
            }

            try {
                //Consulta por Id
                $rol = Rol::findOrFail($id);
                //Actualización de datos
                $rol->name = $request->name ?? $rol->name;
                $rol->description = $request->description ?? $rol->description;
                $rol->active = $request->active ?? $rol->active;
                $rol->save();

                return response()->json([
                    'data' => [
                        'rol' => $rol,
                    ],
                    'message' => 'Rol actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Rol con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    //Destroy: Elimina un resgistro de la BD
    public function destroy(Request $request, int $id)
    {
        if ($id) {
            try {
                //Delete por id
                $rol = Rol::findOrFail($id);
                $rol->delete();
                return response()->json([
                    'data' => [
                        'rol' => $rol,
                    ],
                    'message' => 'Rol eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Rol con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    public function showOptionById(Request $request, int $id)
    {

        if ($id) {
            try {
                //Comprobar existencia
                //$existencia = OptionRol::where('option_id', '=', $id)->firstOrFail();
                //Consultar option
                $rol = Rol::find($id);
                //Aplicar relación
                $options = $rol->options;

                return response()->json([
                    'data' => [
                        'options' => $options,
                    ],
                    'message' => 'Options consultados con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Options relacionados al Rol con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
