<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Commerce;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\ICommerceQuery;


class CommerceQuery implements ICommerceQuery
{

    private $name       = 'name';
    private $phone      = 'phone';
    private $address    = 'address';
    private $description = 'description';
    private $logo       = 'logo';
    private $active     = 'active';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los Comercios existentes
            $commerces = Commerce::query()
                ->select([
                    'id',
                    $this->name,
                    $this->phone,
                    $this->address,
                    $this->description,
                    $this->logo,
                    $this->active,
                ])->get();

            return response()->json(['commerces' => $commerces]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
        }
    }
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->name  => 'string|min:1|max:60',
            $this->phone => 'string|max:16',
            $this->address => 'string|max:255',
            $this->description  => 'string|max:2048',
            $this->logo  => 'string|max:255',
            $this->active    => 'boolean',
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 400);
        }

        try {
            //Recepción de datos y guardado en la BD
            $commerce = new Commerce([
                $this->name => $request->name,
                $this->phone => $request->phone,
                $this->address => $request->address,
                $this->description => $request->description,
                $this->logo => $request->logo,
                $this->active => $request->active,
            ]);

            $commerce->save();

            return response()->json([
                'data' => [
                    'commerce' => $commerce,
                ],
                'message' => 'commerce_store_ok'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $cm = Commerce::findOrFail($id);
                if ($cm) {
                    //Select a la BD: TB_customer
                    $commerce = Commerce::query()
                        ->select([
                            'id',
                            $this->name,
                            $this->phone,
                            $this->address,
                            $this->description,
                            $this->logo,
                            $this->active,
                        ])
                        ->where('commerces.id', '=', $id)
                        ->with(['users'])
                        ->with(['projects'])
                        ->get();
                    return response()->json([
                        'data' => [
                            'commerce' => $commerce,
                        ],
                        'message' => 'data_commerce_consulted_ok'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Colaborator con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
    public function update(Request $request, int $id)
    {
        if ($id) {
            //Rules: Especificaciones a validar
            $rules = [
                $this->name  => 'string|min:1|max:60',
                $this->phone => 'string|max:16',
                $this->address => 'string|max:255',
                $this->description  => 'string|max:2048',
                $this->logo  => 'string|max:255',
                $this->active    => 'boolean',
            ];

            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 400);
            }

            try {
                //Consulta por Id
                $commerce = Commerce::findOrFail($id);
                //Actualización de datos
                $commerce->name = $request->name ?? $commerce->name;
                $commerce->phone = $request->phone ?? $commerce->phone;
                $commerce->address = $request->address ?? $commerce->address;
                $commerce->description = $request->description ?? $commerce->description;
                $commerce->logo = $request->logo ?? $commerce->logo;
                $commerce->active = $request->active ?? $commerce->active;

                $commerce->save();

                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'commerce_updated_ok'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Commercio con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    public function destroy(Request $request, int $id)
    {
        if ($id) {
            try {
                //Delete por id
                $commerce = Commerce::findOrFail($id);
                $commerce->delete();
                return response()->json([
                    'data' => [
                        'commerce' => $commerce,
                    ],
                    'message' => 'commerce_deleted_ok'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "commerce con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
