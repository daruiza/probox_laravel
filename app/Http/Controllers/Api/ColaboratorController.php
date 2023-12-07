<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IColaboratorQuery;

class ColaboratorController extends Controller
{
    private $ColaboratorQuery;

    public function __construct(IColaboratorQuery $ColaboratorQuery)
    {
        $this->ColaboratorQuery = $ColaboratorQuery;
    }

    /**
     * Listado de todos los Colaborators
     * @OA\Get(
     *      path="/colaborator/index",
     *      operationId="getCustomer",
     *      tags={"Colaborator"},
     *      summary="Get All Colaborators",
     *      description="Return Colaborators",
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
        return $this->ColaboratorQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/colaborator/store",
     *      operationId="storeColaborator",
     *      tags={"Colaborator"},
     *      summary="Store Colaborator",
     *      description="Store Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Colaborator")
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
        return $this->ColaboratorQuery->store($request);
    }


    /**
     * @OA\Put(
     *      path="/colaborator/update/{id}",
     *      operationId="getUpdateColaboratorById",
     *      tags={"Colaborator"},
     *      summary="Update One Colaborator By one Id",
     *      description="Update One Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Colaborator Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Colaborator")
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
        return $this->ColaboratorQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/colaborator/destroy/{id}",
     *      operationId="getDestroyColaboratorById",
     *      tags={"Colaborator"},
     *      summary="Delete One Colaborator By one Id",
     *      description="Delete One Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Colaborator Id",
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
        return $this->ColaboratorQuery->destroy($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/colaborator/showbyid/{id}",
     *      operationId="getColaboratorById",
     *      tags={"Colaborator"},
     *      summary="Get One Colaborator By one Id",
     *      description="Return One Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Colaborator Id",
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
        return $this->ColaboratorQuery->showById($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/colaborator/showbyuserid/{id}",
     *      operationId="getColaboratorByUserId",
     *      tags={"Colaborator"},
     *      summary="Get One Colaborator By one User Id",
     *      description="Return One Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Colaborator Id",
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
    public function showByUserId(Request $request, $id)
    {
        return $this->ColaboratorQuery->showByUserId($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/colaborator/showbyprojectid/{id}",
     *      operationId="getColaboratorByProjectId",
     *      tags={"Colaborator"},
     *      summary="Get One Colaborator By one Project Id",
     *      description="Return One Colaborator",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Colaborator Id",
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
        return $this->ColaboratorQuery->showByProjectId($request, $id);
    }
}
