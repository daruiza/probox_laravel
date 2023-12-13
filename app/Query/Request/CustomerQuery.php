<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Customer;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\ICustomerQuery;


class CustomerQuery implements ICustomerQuery
{

    private $is_owner       = 'is_owner';
    private $user_id        = 'user_id';
    private $project_id     = 'project_id';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los PROJECTS existentes
            $customers = Customer::query()
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
            $customer_find = Customer::query()
                ->userId($request->user_id)
                ->projectId($request->project_id)
                ->get();


            if (count($customer_find)) {
                throw (new ValidationException('El usuario y el proyecto ya se hallan relacionados'));
            }
            //Recepción de datos y guardado en la BD
            $customer = new Customer([
                $this->is_owner => $request->is_owner,
                $this->user_id => $request->user_id,
                $this->project_id => $request->project_id,
            ]);

            $customer->save();

            return response()->json([
                'data' => [
                    'customer' => $customer,
                ],
                'message' => 'Customer creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $ct = Customer::findOrFail($id);
                if ($ct) {
                    //Select a la BD: TB_customer
                    $customer = DB::table('customers')
                        ->select([
                            'id',
                            $this->is_owner,
                            $this->user_id,
                            $this->project_id
                        ])
                        ->where('customers.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'customer' => $customer,
                        ],
                        'message' => 'Datos de customer Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Customer con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
    public function update(Request $request, int $id)
    {
        if ($id) {
            //Rules: Especificaciones a validar
            $rules = [                
                $this->is_owner    => 'required|boolean',
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
                //Consulta por Id
                $customer = Customer::findOrFail($id);
                //Actualización de datos
                $customer->is_owner = $request->is_owner ?? $customer->is_owner;
                $customer->project_id = $request->project_id ?? $customer->project_id;

                $customer->save();

                return response()->json([
                    'data' => [
                        'customer' => $customer,
                    ],
                    'message' => 'cliente actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "cleinte con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
    public function destroy(Request $request, int $id)
    {
        if ($id) {
            try {
                //Delete por id
                $customer = Customer::findOrFail($id);
                $customer->delete();
                return response()->json([
                    'data' => [
                        'customer' => $customer,
                    ],
                    'message' => 'colaborador eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "cliente con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showByUserId(Request $request, int $id)
    {
        if ($id) {
            try {
                $customer = Customer::query()
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
                return response()->json(['message' => "Customer con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
    public function showByProjectId(Request $request, int $id)
    {
        if ($id) {
            try {
                $customer = Customer::query()
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
                return response()->json(['message' => "Customer con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
