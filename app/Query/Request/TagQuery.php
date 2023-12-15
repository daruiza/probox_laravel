<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Tag;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\ITagQuery;


class TagQuery implements ITagQuery
{
    private $name   = 'name';
    private $category  = 'category';
    private $active  = 'active';

    //Index: Página principal
    public function index(Request $request)
    {
        try {
            //Devuelve todos los TASKS existentes
            $tag = Tag::query()
                ->select([
                    'id',
                    'name',
                    'category',
                    'active',
                ])->get();

            return response()->json(['message' => $tag]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 403);
        }
    }

    //Store: Guardar datos en la BD
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->name    => 'required|string|min:1|max:60|',
            $this->category    => 'required|string|min:1|max:60|',
            $this->active    => 'boolean',

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
            $tag = new Tag([
                $this->name => $request->name,
                $this->category => $request->category,
                $this->active => $request->active,
            ]);

            $tag->save();

            return response()->json([
                'data' => [
                    'tag' => $tag,
                ],
                'message' => 'Tag creado correctamente!'
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
                $tg = Tag::findOrFail($id);

                if ($tg) {
                    //Select a la BD: TB_tasks
                    $tag = DB::table('tags')
                        ->select([
                            'id',
                            'name',
                            'category',
                            'active',
                        ])
                        ->where('tags.id', '=', $id)
                        ->get();
                    return response()->json([
                        'data' => [
                            'tag' => $tag,
                        ],
                        'message' => 'Datos de tags Consultados Correctamente!'
                    ]);
                }
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $e->getMessage()], 403);
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
                $this->name    => 'required|string|min:1|max:60|',
                $this->category    => 'required|string|min:1|max:60|',
                $this->active    => 'boolean',

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
                $tag = Tag::findOrFail($id);
                //Actualización de datos
                $tag->name = $request->name ?? $tag->name;
                $tag->category = $request->category ?? $tag->category;
                $tag->active = $request->active ?? $tag->active;

                $tag->save();

                return response()->json([
                    'data' => [
                        'tag' => $tag,
                    ],
                    'message' => 'Tag actualizado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $ex->getMessage()], 404);
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
                $tag = Tag::findOrFail($id);
                $tag->delete();
                return response()->json([
                    'data' => [
                        'tag' => $tag,
                    ],
                    'message' => 'Tag eliminado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }    

    // showProjectByTagName
    public function showProjectById(Request $request, int $id)
    {
        if ($id) {
            try {
                ////Comprobar existencia
                //$existencia = Option::find($id)->firstOrFail();
                //Consultar option
                $tag = Tag::find($id);
                //Aplicar relación
                $tag->projects;

                return response()->json([
                    'data' => [
                        'tag' => $tag,
                    ],
                    'message' => 'Tag consultado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag relacionado a la tag con id {$id} no existe!", 'error' => $e->getMessage()], 403);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 403);
        }
    }
}
