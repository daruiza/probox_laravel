<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Task;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\ITaskQuery;


class TaskQuery implements ITaskQuery
{
    private $name   = 'name';
    private $description  = 'description';
    private $date_init  = 'date_init';
    private $date_closed  = 'date_closed';
    private $focus  = 'focus';
    private $id_task  = 'id_task';
    private $project_id  = 'project_id';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los TASKS existentes
            $task = Task::query()
                ->select(['id',
                    'name',
                    'description',
                    'date_init',
                    'date_closed',
                    'focus',
                    'id_task',
                    'project_id'
                ])->get();

            return response()->json(['message' => $task]);
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
            $this->description    => 'required|string|min:1|max:128|',
            $this->date_init    => 'required',
            $this->date_closed    => 'required',
            $this->focus    => 'required',
            $this->project_id   => 'required',
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
            $task = new Task([
                $this->name => $request->name,
                $this->description => $request->description,
                $this->date_init => $request->date_init,
                $this->date_closed => $request->date_closed,
                $this->focus => $request->focus,
                $this->id_task => $request->id_task,
                $this->project_id => $request->project_id
            ]);

            $task->save();

            return response()->json([
                'data' => [
                    'task' => $task,
                ],
                'message' => 'Task creado correctamente!'
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
                $tk = Task::findOrFail($id);

                if ($tk) {
                    //Select a la BD: TB_tasks
                    $task = DB::table('tasks')
                        ->select(['id',
                            'name',
                            'description',
                            'date_init',
                            'date_closed',
                            'focus',
                            'id_task',
                            'project_id'
                        ])
                        ->where('tasks.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'task' => $task,
                        ],
                        'message' => 'Datos de tasks Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Task con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                $this->description    => 'required|string|min:1|max:128|',
                $this->date_init    => 'required',
                $this->date_closed    => 'required',
                $this->focus    => 'required',
                $this->project_id   => 'required',
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
                $task = Task::findOrFail($id);
                //Actualización de datos
                $task->name = $request->name ?? $task->name;
                $task->description = $request->description ?? $task->description;
                $task->date_init = $request->date_init ?? $task->date_init;
                $task->date_closed = $request->date_closed ?? $task->date_closed;
                $task->focus = $request->focus ?? $task->focus;
                $task->id_task = $request->id_task ?? $task->id_task;
                $task->project_id = $request->project_id ?? $task->project_id;

                $task->save();

                return response()->json([
                    'data' => [
                        'task' => $task,
                    ],
                    'message' => 'Task actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Task con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $task = Task::findOrFail($id);
                $task->delete();
                return response()->json([
                    'data' => [
                        'task' => $task,
                    ],
                    'message' => 'Task eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Task con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    
}
