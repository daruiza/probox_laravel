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

    private $activity_rol       = 'activity_rol';
    private $date_start       = 'date_start';
    private $date_departure       = 'date_departure';
    private $recommended       = 'recommended';
    private $boss_name       = 'boss_name';
    private $user_id        = 'user_id';
    private $project_id     = 'project_id';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los PROJECTS existentes
            $colaborators = Colaborator::query()
                ->select([
                    'id',
                    $this->activity_rol,
                    $this->date_start,
                    $this->date_departure,
                    $this->recommended,
                    $this->boss_name,
                    $this->user_id,
                    $this->project_id,
                ])->get();

            return response()->json(['colaborators' => $colaborators]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->activity_rol  => 'string|min:1|max:128',
            $this->date_start => 'date',
            $this->date_departure => 'date',
            $this->recommended  => 'string|min:1|max:128',
            $this->boss_name  => 'string|min:1|max:128',
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
            $coalborator_find = Colaborator::query()
                ->userId($request->user_id)
                ->projectId($request->project_id)
                ->get();


            if (count($coalborator_find)) {
                throw (new ValidationException('El usuario y el proyecto ya se hallan relacionados'));
            }
            //Recepción de datos y guardado en la BD
            $colaborator = new Colaborator([
                $this->activity_rol => $request->activity_rol,
                $this->date_start => $request->date_start,
                $this->date_departure => $request->date_departure,
                $this->recommended => $request->recommended,
                $this->boss_name => $request->boss_name,
                $this->user_id => $request->user_id,
                $this->project_id => $request->project_id,
            ]);

            $colaborator->save();

            return response()->json([
                'data' => [
                    'colaborator' => $colaborator,
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
                    $colaborator = DB::table('colaborators')
                        ->select([
                            'id',
                            $this->activity_rol,
                            $this->date_start,
                            $this->date_departure,
                            $this->recommended,
                            $this->boss_name,
                            $this->user_id,
                            $this->project_id
                        ])
                        ->where('colaborators.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'colaborator' => $colaborator,
                        ],
                        'message' => 'Datos de colaborator Consultados Correctamente!'
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
        if ($id) {
            //Rules: Especificaciones a validar
            $rules = [
                $this->activity_rol  => 'string|min:1|max:128',
                $this->date_start => 'date',
                $this->date_departure => 'date',
                $this->recommended  => 'string|min:1|max:128',
                $this->boss_name  => 'string|min:1|max:128',
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
                //Consulta por Id
                $colaborator = Colaborator::findOrFail($id);
                //Actualización de datos
                $colaborator->activity_rol = $request->name ?? $colaborator->activity_rol;
                $colaborator->date_start = $request->price ?? $colaborator->date_start;
                $colaborator->date_departure = $request->date_init ?? $colaborator->date_departure;
                $colaborator->recomended = $request->date_closed ?? $colaborator->recomended;
                $colaborator->boss_name = $request->address ?? $colaborator->boss_name;
                $colaborator->user_id = $request->location ?? $colaborator->user_id;
                $colaborator->project_id = $request->quotation ?? $colaborator->project_id;

                $colaborator->save();

                return response()->json([
                    'data' => [
                        'colaborator' => $colaborator,
                    ],
                    'message' => 'colaborador actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Colaborador con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $colaborator = Colaborator::findOrFail($id);
                $colaborator->delete();
                return response()->json([
                    'data' => [
                        'colaborator' => $colaborator,
                    ],
                    'message' => 'colaborador eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "colaborador con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showByUserId(Request $request, int $id)
    {
        if ($id) {
            try {
                $colaborator = Colaborator::query()
                    ->select([
                        'id',
                        $this->activity_rol,
                        $this->date_start,
                        $this->date_departure,
                        $this->recommended,
                        $this->boss_name,
                        $this->user_id,
                        $this->project_id
                    ])
                    ->userId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'colaborator' => $colaborator,
                    ],
                    'message' => 'Datos de colaborator Consultados Correctamente!'
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
                $colaborator = Colaborator::query()
                    ->select([
                        'id',
                        $this->activity_rol,
                        $this->date_start,
                        $this->date_departure,
                        $this->recommended,
                        $this->boss_name,
                        $this->user_id,
                        $this->project_id
                    ])
                    ->projectId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'colaborator' => $colaborator,
                    ],
                    'message' => 'Datos de colaborator Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Colaborator con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
