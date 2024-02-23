<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Document;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\IDocumentQuery;


class DocumentQuery implements IDocumentQuery
{

    private $name = 'name';
    private $file = 'file';
    private $type = 'type';
    private $description = 'description';
    private $approved    = 'approved';
    private $focus       = 'focus';
    private $project_id  = 'project_id';

    public function index(Request $request)
    {
        try {
            //Devuelve todos los PROJECTS existentes
            $documents = Document::query()
                ->select([
                    'id',
                    $this->name,
                    $this->file,
                    $this->type,
                    $this->description,
                    $this->approved,
                    $this->focus,
                    $this->project_id,
                ])->get();

            return response()->json(['documents' => $documents]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
        }
    }

    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->name  => 'required|string',
            $this->file  => 'required|string',
            $this->type  => 'required|string',
            $this->description  => 'string',
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
            $document = new Document([
                $this->name => $request->name,
                $this->file => $request->file,
                $this->type => $request->type,
                $this->description => $request->description,
                $this->approved => $request->approved,
                $this->focus => $request->focus,
                $this->project_id => $request->project_id,
            ]);

            $document->save();

            return response()->json([
                'data' => [
                    'document' => $document,
                ],
                'message' => 'document creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
        }
    }

    public function showById(Request $request,  int $id)
    {
        if ($id) {
            try {
                $dt = Document::findOrFail($id);
                if ($dt) {
                    //Select a la BD: TB_customer
                    $document = DB::table('documents')
                        ->select([
                            'id',
                            $this->name,
                            $this->file,
                            $this->type,
                            $this->description,
                            $this->approved,
                            $this->focus,
                            $this->project_id
                        ])
                        ->where('documents.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'document' => $document,
                        ],
                        'message' => 'Datos de Document Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Document con id {$id} no existe!", 'error' => $e->getMessage()], 400);
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
                $this->name  => 'required|string',
                $this->file  => 'required|string',
                $this->type  => 'required|string',
                $this->description  => 'string',
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
                $document = Document::findOrFail($id);
                //Actualización de datos
                $document->name = $request->name ?? $document->name;
                $document->file = $request->file ?? $document->file;
                $document->type = $request->type ?? $document->type;
                $document->description = $request->description ?? $document->description;
                $document->approved = $request->approved ?? $document->approved;
                $document->focus = $request->focus ?? $document->focus;

                $document->save();

                return response()->json([
                    'data' => [
                        'document' => $document,
                    ],
                    'message' => 'document actualizada con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "document con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $document = Document::findOrFail($id);
                $document->delete();
                return response()->json([
                    'data' => [
                        'document' => $document,
                    ],
                    'message' => 'document eliminada con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "document con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    public function showByProjectId(Request $request, int $id)
    {
        if ($id) {
            try {
                $document = Document::query()
                    ->select([
                        'id',
                        $this->name,
                        $this->file,
                        $this->type,
                        $this->description,
                        $this->approved,
                        $this->focus,
                        $this->project_id
                    ])
                    ->projectId($id)
                    ->get();

                return response()->json([
                    'data' => [
                        'document' => $document,
                    ],
                    'message' => 'Datos de document Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "document con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
