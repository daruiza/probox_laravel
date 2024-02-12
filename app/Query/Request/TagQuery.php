<?php

namespace App\Query\Request;

use Illuminate\Support\Facades\DB;
use App\Model\Core\Tag;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\ITagQuery;
use ProjectTag;

class TagQuery implements ITagQuery
{
    private $name   = 'name';
    private $class   = 'class';
    private $category  = 'category';
    private $default = 'default';
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
                    'class',
                    'category',
                    'default',
                    'active',
                ])
                ->category($request->category)
                ->default($request->default)
                ->get();

            return response()->json(['tags' => $tag]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
        }
    }

    //Store: Guardar datos en la BD
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->name    => 'required|string|min:1|max:60|',
            $this->class    => 'required|string|min:1|max:60|',
            $this->category    => 'required|string|min:1|max:60|',
            $this->default    => 'boolean',
            $this->active    => 'boolean'
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
            $tag = new Tag([
                $this->name => $request->name,
                $this->class => $request->class,
                $this->category => $request->category,
                $this->default => $request->default,
                $this->active => $request->active,
            ]);

            $tag->save();

            // Si hay project_id se realiza la reasignación
            if ($request->project_id) {
                request()->merge([
                    'tag_id' => $tag->id,
                    'project_id' => $request->project_id,
                    'return_all' => $request->return_all,
                    'category' => $request->return_category
                ]);
                return (new ProjectTagQuery)->store($request);
            }

            return response()->json([
                'data' => [
                    'tag' => $tag,
                ],
                'message' => 'Tag creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e->getMessage()], 400);
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
                            'class',
                            'category',
                            'default',
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
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    //Update: Actualiza los datos en la BD
    public function update(Request $request, int $id)
    {
        if ($id) {

            //Rules: Especificaciones a validar
            $rules = [
                $this->name    => 'required|string|min:1|max:60',
                $this->category    => 'required|string|min:1|max:60',
                $this->class    => 'required|string|min:1|max:60',
                $this->default    => 'boolean',
                $this->active    => 'boolean',

            ];
            try {
                // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
                $validator = Validator::make($request->all(), $rules);
                if ($validator->fails()) {
                    throw (new ValidationException($validator->errors()->getMessages()));
                }
            } catch (\Exception $e) {
                return response()->json(['message' => 'Los datos ingresados no son validos!', 'error' => $e], 400);
            }

            try {
                //Consulta por Id
                $tag = Tag::findOrFail($id);
                //Actualización de datos
                $tag->name = $request->name ?? $tag->name;
                $tag->class = $request->class ?? $tag->class;
                $tag->category = $request->category ?? $tag->category;
                $tag->default = $request->default ?? $tag->default;
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
                return response()->json(['message' => 'Algo salio mal!', 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
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
                    'message' => 'tag_removed_correctly'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    // Muestra todos los proyectos con respecto a in tagId
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
                return response()->json(['message' => "Tag relacionado a la tag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
