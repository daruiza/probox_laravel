<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ITagQuery;

class TagController extends Controller
{

    private $TagQuery;

    public function __construct(ITagQuery $TagQuery)
    {
        $this->TagQuery = $TagQuery;
    }

    /**
     * Listado de todos los Tag
     * @OA\Get(
     *      path="/tag/index",
     *      operationId="getTag",
     *      tags={"Tag"},
     *      summary="Get All Tag",
     *      description="Return Tag",
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
        return $this->TagQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/tag/store",
     *      operationId="storeTag",
     *      tags={"Tag"},
     *      summary="Store Tag",
     *      description="Store Tag",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Tag")
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
        return $this->TagQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/tag/showbyid/{id}",
     *      operationId="getTagById",
     *      tags={"Tag"},
     *      summary="Get One Tag By one Id",
     *      description="Return One Tag",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tag Id",
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
         return $this->TagQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/tag/update/{id}",
     *      operationId="getUpdateTagById",
     *      tags={"Tag"},
     *      summary="Update One Tag By one Id",
     *      description="Update One Tag",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Tag Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Tag")
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
         return $this->TagQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/tag/destroy/{id}",
      *      operationId="getDestroyTagById",
      *      tags={"Tag"},
      *      summary="Delete One Tag By one Id",
      *      description="Delete One Tag",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Tag Id",
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
         return $this->TagQuery->destroy($request, $id);
     }
     

    /**
     * @OA\Get(
     *      path="/tag/showprojectbyid/{id}",
     *      operationId="getShowProjectById",
     *      tags={"Tag"},
     *      summary="Get One Project By one Id",
     *      description="Return One Project by Id",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Show Project by Id",
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
    public function showProjectkById(Request $request, int $id)
    {
        return $this->TagQuery->showProjectById($request, $id);
    }

 }
 