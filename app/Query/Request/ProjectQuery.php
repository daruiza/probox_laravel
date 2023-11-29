<?php

namespace App\Query\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Project;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IProjectQuery;


class ProjectQuery implements IProjectQuery
{
    private $name   = 'name';
    private $price  = 'price';
    private $date_init  = 'date_init';
    private $date_closed  = 'date_closed';
    private $address  = 'address';
    private $location  = 'location';
    private $quotation  = 'quotation';
    private $goal  = 'goal';
    private $logo  = 'logo';
    private $photo  = 'photo';
    private $description = 'description';
    private $focus = 'focus';
    private $active  = 'active';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            $rules = [
                $this->name    => 'string|min:1|max:128|',
                $this->address    => 'string|min:1|max:1024|',
                $this->date_init    => 'date',
                $this->date_closed    => 'date',
            ];
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                throw (new ValidationException($validator->errors()->getMessages()));
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 403);
        }

        // return response()->json([
        //     'request' => $request->input(),
        //     // 'date_init'=> Carbon::create($request->date_init)->format('Y-m-d'),
        //     'date_init'=> Carbon::create($request->date_init)->toDateTimeString(),
        //     'now'=> Carbon::now()->toDateTimeString()
        // ]);

        try {

            //Devuelve todos los PROJECTS existentes
            $project = Project::query()
                ->select([
                    'id',
                    'name',
                    'price',
                    'date_init',
                    'date_closed',
                    'address',
                    'location',
                    'quotation',
                    'goal',
                    'logo',
                    'photo',
                    'description',
                    'focus',
                    'active'
                ])
                ->with(['customers'])
                ->name($request->name)
                ->adress($request->adress)
                ->date_init($request->date_init)
                ->date_closed($request->date_closed)
                // ->date_between('date_init', Carbon::create($request->date_init)->toDateTimeString(), Carbon::now()->toDateTimeString())
                ->paginate($request->limit ?? 12, ['*'], '', $request->page ?? 1);

            return response()->json(['projects' => $project]);
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
            $this->price    => 'numeric',
            $this->date_init    => 'date',
            $this->date_closed    => 'date',
            $this->address    => 'string|min:1|max:512|',
            $this->quotation    => 'string|min:1|max:512|',
            $this->goal    => 'string|min:1|max:1024|',
            $this->logo    => 'string',
            $this->photo    => 'string',
            $this->description   => 'string|min:1|max:1024|',
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
            //Recepción de datos y guardado en la BD
            $project = new Project([
                $this->name => $request->name,
                $this->price => $request->price,
                $this->date_init => $request->date_init,
                $this->date_closed => $request->date_closed,
                $this->address => $request->address,
                $this->location => $request->location,
                $this->quotation => $request->quotation,
                $this->goal => $request->goal,
                $this->logo => $request->logo,
                $this->photo => $request->photo,
                $this->description => $request->description,
                $this->focus => $request->focus,
                $this->active => $request->active,
            ]);

            $project->save();

            return response()->json([
                'data' => [
                    'project' => $project,
                ],
                'message' => 'Project creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 403);
        }
    }

    //Show: Obtener un registro de la tabla
    public function showById(Request $request,  int $id)
    {

        if ($id) {
            try {
                $pj = Project::findOrFail($id);

                if ($pj) {
                    //Select a la BD: TB_projects
                    $project = DB::table('projects')
                        ->select([
                            'id',
                            'name',
                            'price',
                            'date_init',
                            'date_closed',
                            'address',
                            'location',
                            'quotation',
                            'goal',
                            'logo',
                            'photo',
                            'description',
                            'focus',
                            'active'
                        ])
                        ->where('projects.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'project' => $project,
                        ],
                        'message' => 'Datos de projects Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Project con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                $this->price    => 'numeric',
                $this->date_init    => 'date',
                $this->date_closed    => 'date',
                $this->address    => 'string|min:1|max:512|',
                $this->quotation    => 'string|min:1|max:512|',
                $this->goal    => 'string|min:1|max:1024|',
                $this->logo    => 'string',
                $this->photo    => 'string',
                $this->description   => 'string|min:1|max:1024|',
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
                $project = Project::findOrFail($id);
                //Actualización de datos
                $project->name = $request->name ?? $project->name;
                $project->price = $request->price ?? $project->price;
                $project->date_init = $request->date_init ?? $project->date_init;
                $project->date_closed = $request->date_closed ?? $project->date_closed;
                $project->address = $request->address ?? $project->address;
                $project->location = $request->location ?? $project->location;
                $project->quotation = $request->quotation ?? $project->quotation;
                $project->goal = $request->goal ?? $project->goal;
                $project->logo = $request->logo ?? $project->logo;
                $project->photo = $request->photo ?? $project->photo;
                $project->description = $request->description ?? $project->description;
                $project->focus = $request->focus ?? $project->focus;
                $project->active = $request->active ?? $project->active;

                $project->save();

                return response()->json([
                    'data' => [
                        'project' => $project,
                    ],
                    'message' => 'Project actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Project con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $project = Project::findOrFail($id);
                $project->delete();
                return response()->json([
                    'data' => [
                        'project' => $project,
                    ],
                    'message' => 'Project eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Projects con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showTaskById(Request $request, int $id)
    {
        if ($id) {
            try {
                //Comprobar existencia
                //$existencia = OptionRol::where('option_id', '=', $id)->firstOrFail();
                //Consultar option
                $project = Project::find($id);
                //Aplicar relación
                $tasks = $project->tasks;

                return response()->json([
                    'data' => [
                        'tasks' => $tasks,
                    ],
                    'message' => 'Tasks consultadas con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json([
                    'message' => "Tasks relacionadas al module con id {$id} no existe!",
                    'error' => $e->getMessage()
                ], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
