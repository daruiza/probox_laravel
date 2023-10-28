<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Evidence;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Query\Abstraction\IEvidenceQuery;


class EvidenceQuery implements IEvidenceQuery
{
    private $name   = 'name';
    private $file  = 'file';
    private $type  = 'type';
    private $description  = 'description';
    private $approved  = 'approved';
    private $focus  = 'focus';
    private $task_id  = 'task_id';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los EVIDENCES existentes
            $evidence = Evidence::query()
                ->select(['id',
                    'name',
                    'file',
                    'type',
                    'description',
                    'approved',
                    'focus',
                    'task_id'
                ])->get();

            return response()->json(['message' => $evidence]);
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
            $this->file    => 'required|string|min:1|max:128|',
            $this->type    => 'required|string|min:1|max:128|',
            $this->description    => 'required|string|min:1|max:128|',
            $this->approved    => 'required',
            $this->focus    => 'required',
            $this->task_id    => 'required',
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
            $evidence = new Evidence([
                $this->name => $request->name,
                $this->file => $request->file,
                $this->type => $request->type,
                $this->description => $request->description,
                $this->approved => $request->approved,
                $this->focus => $request->focus,
                $this->task_id => $request->task_id,
            ]);

            $evidence->save();

            return response()->json([
                'data' => [
                    'evidence' => $evidence,
                ],
                'message' => 'Evidence creado correctamente!'
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
                $ev = Evidence::findOrFail($id);

                if ($ev) {
                    //Select a la BD: TB_evidences
                    $evidence = DB::table('evidences')
                        ->select(['id',
                        'name',
                        'file',
                        'type',
                        'description',
                        'approved',
                        'focus',
                        'task_id'
                        ])
                        ->where('evidences.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'evidence' => $evidence,
                        ],
                        'message' => 'Datos de evidence Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Evidence con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                $this->file    => 'required|string|min:1|max:128|',
                $this->type    => 'required|string|min:1|max:128|',
                $this->description    => 'required|string|min:1|max:128|',
                $this->approved    => 'required',
                $this->focus    => 'required',
                $this->task_id    => 'required',
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
                $evidence = Evidence::findOrFail($id);
                //Actualización de datos
                $evidence->name = $request->name ?? $evidence->name;
                $evidence->file = $request->file ?? $evidence->file;
                $evidence->type = $request->type ?? $evidence->type;
                $evidence->description = $request->description ?? $evidence->description;
                $evidence->approved = $request->approved ?? $evidence->approved;
                $evidence->focus = $request->focus ?? $evidence->focus;
                $evidence->task_id = $request->task_id ?? $evidence->task_id;

                $evidence->save();

                return response()->json([
                    'data' => [
                        'evidence' => $evidence,
                    ],
                    'message' => 'Evidence actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Evidence con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $evidence = Evidence::findOrFail($id);
                $evidence->delete();
                return response()->json([
                    'data' => [
                        'evidence' => $evidence,
                    ],
                    'message' => 'Evidence eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Evidence con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }

    public function showTaskById(Request $request, int $id)
    {
        
        if ($id) {
            try {
                ////Comprobar existencia
                //$existencia = Option::find($id)->firstOrFail();
                //Consultar option
                $evidence = Evidence::find($id);
                //Aplicar relación
                $task = $evidence->task;

                return response()->json([
                    'data' => [
                        'task' => $task,
                    ],
                    'message' => 'Task consultado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Task relacionado a la evidence con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
        
    }
}
