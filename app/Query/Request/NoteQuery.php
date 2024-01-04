<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Note;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\INoteQuery;


class NoteQuery implements INoteQuery
{

    private $description = 'description';
    private $approved    = 'approved';
    private $focus       = 'focus';
    private $project_id  = 'project_id';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los PROJECTS existentes
            $notes = Note::query()
                ->select([
                    'id',
                    $this->description,
                    $this->approved,
                    $this->focus,
                    $this->project_id,
                ])->get();

            return response()->json(['notes' => $notes]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->description  => 'required|string',
            $this->approved     => 'boolean',
            $this->focus        => 'boolean',
            $this->project_id   => 'required|numeric',
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
            $note = new Note([
                $this->description => $request->description,
                $this->approved => $request->approved,
                $this->focus => $request->focus,
                $this->project_id => $request->project_id,
            ]);

            $note->save();

            return response()->json([
                'data' => [
                    'note' => $note,
                ],
                'message' => 'note creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $nt = Note::findOrFail($id);
                if ($nt) {
                    //Select a la BD: TB_customer
                    $note = DB::table('notes')
                        ->select([
                            'id',
                            $this->description,
                            $this->approved,
                            $this->focus,
                            $this->project_id
                        ])
                        ->where('notes.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'note' => $note,
                        ],
                        'message' => 'Datos de Nota Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Nota con id {$id} no existe!", 'error' => $e->getMessage()], 400);
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
                $this->description  => 'required|string',
                $this->approved     => 'boolean',
                $this->focus        => 'boolean',
                $this->project_id   => 'required|numeric',
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
                $note = Note::findOrFail($id);
                //Actualización de datos
                $note->description = $request->description ?? $note->description;
                $note->approved = $request->approved ?? $note->approved;
                $note->focus = $request->focus ?? $note->focus;

                $note->save();

                return response()->json([
                    'data' => [
                        'note' => $note,
                    ],
                    'message' => 'nota actualizada con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "nota con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $note = Note::findOrFail($id);
                $note->delete();
                return response()->json([
                    'data' => [
                        'note' => $note,
                    ],
                    'message' => 'nota eliminada con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "nota con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    public function showByProjectId(Request $request, int $id)
    {
        if ($id) {
            try {
                $note = Note::query()
                    ->select([
                        'id',
                        $this->description,
                        $this->approved,
                        $this->focus,
                        $this->project_id
                    ])
                    ->projectId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'note' => $note,
                    ],
                    'message' => 'Datos de nota Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "nota con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
