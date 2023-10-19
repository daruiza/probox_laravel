<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IRolQuery;

class RolController extends Controller
{

    private $RolQuery;

    public function __construct(IRolQuery $RolQuery)
    {
        $this->RolQuery = $RolQuery;
    }

    /**
     * @OA\Get(
     *      path="/rol/index",
     *      operationId="getRol",
     *      tags={"Rol"},
     *      summary="Get All Rol",
     *      description="Return Rol",
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
        return $this->RolQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/rol/store",
     *      operationId="storeRol",
     *      tags={"Rol"},
     *      summary="Store Rol",
     *      description="Store Rol",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Rol")
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
        return $this->RolQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/rol/showbyid/{id}",
     *      operationId="getRolById",
     *      tags={"Rol"},
     *      summary="Get One Rol By one Id",
     *      description="Return One Rol",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Rol Id",
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
         return $this->RolQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/rol/update/{id}",
     *      operationId="getUpdateRolById",
     *      tags={"Rol"},
     *      summary="Update One Rol By one Id",
     *      description="Update One Rol",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Rol Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Rol")
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
         return $this->RolQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/rol/destroy/{id}",
      *      operationId="getDestroyRolById",
      *      tags={"Rol"},
      *      summary="Delete One Rol By one Id",
      *      description="Delete One Rol",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Rol Id",
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
         return $this->RolQuery->destroy($request, $id);
     }

     /**
     * @OA\Get(
     *      path="/rol/showoptionbyid/{id}",
     *      operationId="getShowOptionById",
     *      tags={"Rol"},
     *      summary="Get Options By one Id",
     *      description="Return Options by Id",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Show Option by Id",
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
    public function showOptionById(Request $request, int $id)
    {
        return $this->RolQuery->showOptionById($request, $id);
    }

 }
 