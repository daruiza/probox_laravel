<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\INoteQuery;

class NoteController extends Controller
{
    private $NoteQuery;

    public function __construct(INoteQuery $NoteQuery)
    {
        $this->NoteQuery = $NoteQuery;
    }

    /**
     * Listado de todos las Notas
     * @OA\Get(
     *      path="/note/index",
     *      operationId="getNotes",
     *      tags={"Note"},
     *      summary="Get All Notes",
     *      description="Return Notes",
     *      security={ {"bearer": {} }},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index(Request $request)
    {
        return $this->NoteQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/note/store",
     *      operationId="storeNote",
     *      tags={"Note"},
     *      summary="Store Note",
     *      description="Store Note",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Note")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function store(Request $request)
    {
        return $this->NoteQuery->store($request);
    }


    /**
     * @OA\Put(
     *      path="/note/update/{id}",
     *      operationId="getUpdateNoteById",
     *      tags={"Note"},
     *      summary="Update One Note By one Id",
     *      description="Update One Note",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Note Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Note")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function update(Request $request, $id)
    {
        return $this->NoteQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/note/destroy/{id}",
     *      operationId="getDestroyNoteById",
     *      tags={"Note"},
     *      summary="Delete One Note By one Id",
     *      description="Delete One Note",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Note Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function destroy(Request $request, $id)
    {
        return $this->NoteQuery->destroy($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/note/showbyid/{id}",
     *      operationId="getNoteById",
     *      tags={"Note"},
     *      summary="Get One Note By one Id",
     *      description="Return One Note",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Note Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function showById(Request $request, $id)
    {
        return $this->NoteQuery->showById($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/note/showbyprojectid/{id}",
     *      operationId="getNoteByProjectId",
     *      tags={"Note"},
     *      summary="Get One Note By one Project Id",
     *      description="Return One Note",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Note Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated"
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function showByProjectId(Request $request, $id)
    {
        return $this->NoteQuery->showByProjectId($request, $id);
    }
}
