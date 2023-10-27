<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ITaskQuery;

class TaskController extends Controller
{

    private $TaskQuery;

    public function __construct(ITaskQuery $TaskQuery)
    {
        $this->TaskQuery = $TaskQuery;
    }

    /**
     * Listado de todos los Task
     * @OA\Get(
     *      path="/task/index",
     *      operationId="getTask",
     *      tags={"Task"},
     *      summary="Get All Task",
     *      description="Return Task",
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
        return $this->TaskQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/task/store",
     *      operationId="storeTask",
     *      tags={"Task"},
     *      summary="Store Task",
     *      description="Store Task",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Task")
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
        return $this->TaskQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/task/showbyid/{id}",
     *      operationId="getTaskById",
     *      tags={"Task"},
     *      summary="Get One Task By one Id",
     *      description="Return One Task",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Task Id",
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
         return $this->TaskQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/task/update/{id}",
     *      operationId="getUpdateTaskById",
     *      tags={"Task"},
     *      summary="Update One Task By one Id",
     *      description="Update One Task",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Task Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Task")
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
         return $this->TaskQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/task/destroy/{id}",
      *      operationId="getDestroyTaskById",
      *      tags={"Task"},
      *      summary="Delete One Task By one Id",
      *      description="Delete One Task",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Task Id",
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
         return $this->TaskQuery->destroy($request, $id);
     }

 }
 