<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Colaborator;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IColaboratorQuery;


class ColaboratorQuery implements IColaboratorQuery
{

    private $is_owner       = 'is_owner';
    private $user_id        = 'user_id';
    private $project_id     = 'project_id';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los PROJECTS existentes
            $customers = Colaborator::query()
                ->select([
                    'id',
                    $this->is_owner,
                    $this->user_id,
                    $this->project_id,
                ])->get();

            return response()->json(['customers' => $customers]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->is_owner    => 'required|boolean',
            $this->user_id    => 'required|numeric',
            $this->project_id    => 'required|numeric',
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 403);
        }

        try {

            // Validación unique
            $customer_find = Colaborator::query()
                ->userId($request->user_id)
                ->projectId($request->project_id)
                ->get();


            if (count($customer_find)) {
                throw (new ValidationException('El usuario y el proyecto ya se hallan relacionados'));
            }
            //Recepción de datos y guardado en la BD
            $customer = new Colaborator([
                $this->is_owner => $request->is_owner,
                $this->user_id => $request->user_id,
                $this->project_id => $request->project_id,
            ]);

            $customer->save();

            return response()->json([
                'data' => [
                    'customer' => $customer,
                ],
                'message' => 'Colaborator creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $ct = Colaborator::findOrFail($id);
                if ($ct) {
                    //Select a la BD: TB_customer
                    $customer = DB::table('customer')
                        ->select([
                            'id',
                            $this->is_owner,
                            $this->user_id,
                            $this->project_id
                        ])
                        ->where('customer.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'customer' => $customer,
                        ],
                        'message' => 'Datos de customer Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Colaborator con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
    public function update(Request $request, int $id)
    {
    }
    public function destroy(Request $request, int $id)
    {
    }

    public function showByUserId(Request $request, int $id)
    {
        if ($id) {
            try {
                $customer = Colaborator::query()
                    ->select([
                        'id',
                        $this->is_owner,
                        $this->user_id,
                        $this->project_id
                    ])
                    ->userId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'customer' => $customer,
                    ],
                    'message' => 'Datos de customer Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Colaborator con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
    public function showByProjectId(Request $request, int $id)
    {
        if ($id) {
            try {
                $customer = Colaborator::query()
                    ->select([
                        'id',
                        $this->is_owner,
                        $this->user_id,
                        $this->project_id
                    ])
                    ->projectId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'customer' => $customer,
                    ],
                    'message' => 'Datos de customer Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Colaborator con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
