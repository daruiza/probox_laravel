<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IProjectQuery;

class ProjectController extends Controller
{

    private $ProjectQuery;

    public function __construct(IProjectQuery $ProjectQuery)
    {
        $this->ProjectQuery = $ProjectQuery;
    }

    /**
     * Listado de todos los Project
     * @OA\Get(
     *      path="/project/index",
     *      operationId="getProject",
     *      tags={"Project"},
     *      summary="Get All Project",
     *      description="Return Project",
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
        return $this->ProjectQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/project/store",
     *      operationId="storeProject",
     *      tags={"Project"},
     *      summary="Store Project",
     *      description="Store Project",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Project")
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
        return $this->ProjectQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/project/showbyid/{id}",
     *      operationId="getProjectById",
     *      tags={"Project"},
     *      summary="Get One Project By one Id",
     *      description="Return One Project",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Project Id",
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
         return $this->ProjectQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/project/update/{id}",
     *      operationId="getUpdateProjectById",
     *      tags={"Project"},
     *      summary="Update One Project By one Id",
     *      description="Update One Project",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Project Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Module")
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
         return $this->ProjectQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/project/destroy/{id}",
      *      operationId="getDestroyProjectById",
      *      tags={"Project"},
      *      summary="Delete One Project By one Id",
      *      description="Delete One Project",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Project Id",
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
         return $this->ProjectQuery->destroy($request, $id);
     }

 }
 