<?php

namespace App\Query\Request;

use App\Model\Core\Project;
use Illuminate\Support\Facades\DB;
use App\Model\Core\ProjectTag;
use App\Model\Core\Tag;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;
use App\Query\Abstraction\IProjectTagQuery;


class ProjectTagQuery implements IProjectTagQuery
{
    private $tag_id   = 'tag_id';
    private $project_id   = 'project_id';

    //Store: Guardar datos en la BD
    public function store(Request $request)
    {
        //Rules: Especificaciones a validar
        $rules = [
            $this->tag_id    => 'required|min:1|max:60',
            $this->project_id    => 'required|min:1|max:60'
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
            $projecttag = new ProjectTag([
                $this->tag_id => $request->tag_id,
                $this->project_id => $request->project_id,
            ]);

            $projecttag->save();


            // return_all llega desde Tag/store cuando de guarda un tag nuevo default: 0
            if ($request->return_all) {
                // $request ya contiene category/return_category
                return $this->showTagsByProjectId($request, $request->project_id);
            }

            return response()->json([
                'data' => [
                    'projecttag' => $projecttag,
                ],
                'message' => 'ProjectTag creado correctamente!'
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'No se logro realizar la relación!', 'error' => $e->getMessage()], 400);
        }
    }

    //Show: Obteniene los tags de un projecto
    public function showTagsByProjectId(Request $request,  int $id)
    {
        if ($id) {
            try {
                $project = Project::select()
                    // ->with(['tags'])                    
                    ->where('id', $id)
                    // ->toSql();                    
                    ->first();
                return response()->json([
                    'data' => [
                        'tags' => $project->tags()->category($request->return_category)->get(),
                    ],
                    'message' => 'Datos de tags Consultados Correctamente!'
                ]);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
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
                $projecttag = ProjectTag::findOrFail($id);
                $projecttag->delete();

                // Se borra tambien el TAG
                if ($request->default === 0) {
                    return (new Tag)->destroy($request, $request->tag_id);
                }

                // return_all llega desde Tag/store cuando de guarda un tag nuevo default: 0
                if ($request->return_all) {
                    // $request ya contiene category/return_category
                    return $this->showTagsByProjectId($request, $request->project_id);
                }

                return response()->json([
                    'data' => [
                        'projecttag' => $projecttag,
                    ],
                    'message' => 'projecttag_removed_correctly'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "ProjectTag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }

    // showProjectByTagName
    public function showProjectTagById(Request $request, int $id)
    {
        if ($id) {
            try {
                ////Comprobar existencia
                //$existencia = Option::find($id)->firstOrFail();
                //Consultar option
                $tag = ProjectTag::find($id);
                //Aplicar relación
                $tag->projects;

                return response()->json([
                    'data' => [
                        'tag' => $tag,
                    ],
                    'message' => 'ProjectTag consultado con éxito!'
                ], 201);
            } catch (ModelNotFoundException $e) {
                return response()->json(['message' => "Tag relacionado a la tag con id {$id} no existe!", 'error' => $e->getMessage()], 400);
            }
        } else {
            return response()->json(['message' => 'Algo salio mal!', 'error' => 'Falto ingresar ID'], 400);
        }
    }
}
