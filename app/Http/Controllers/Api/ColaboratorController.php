<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IColaboratorQuery;

class ColaboratorController extends Controller
{
    private $ColabroatorQuery;

    public function __construct(IColaboratorQuery $ColaboratorQuery)
    {
        $this->ColabroatorQuery = $ColaboratorQuery;
    }

    /**
     * Listado de todos los Customers
     * @OA\Get(
     *      path="/customer/index",
     *      operationId="getCustomer",
     *      tags={"Customer"},
     *      summary="Get All Customers",
     *      description="Return Customers",
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
        return $this->ColabroatorQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/customer/store",
     *      operationId="storeCustomer",
     *      tags={"Customer"},
     *      summary="Store Customer",
     *      description="Store Customer",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Customer")
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
        return $this->ColabroatorQuery->store($request);
    }


    /**
     * @OA\Put(
     *      path="/customer/update/{id}",
     *      operationId="getUpdateCustomerById",
     *      tags={"Customer"},
     *      summary="Update One Customer By one Id",
     *      description="Update One Customer",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Customer")
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
        return $this->ColabroatorQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/customer/destroy/{id}",
     *      operationId="getDestroyCustomerById",
     *      tags={"Customer"},
     *      summary="Delete One Customer By one Id",
     *      description="Delete One Customer",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Id",
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
        return $this->ColabroatorQuery->destroy($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/customer/showbyid/{id}",
     *      operationId="getCustomerById",
     *      tags={"Customer"},
     *      summary="Get One Customer By one Id",
     *      description="Return One Customer",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Id",
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
        return $this->ColabroatorQuery->showById($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/customer/showbyuserid/{id}",
     *      operationId="getCustomerByUserId",
     *      tags={"Customer"},
     *      summary="Get One Customer By one User Id",
     *      description="Return One Customer",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Id",
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
        return $this->ColabroatorQuery->showByUserId($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/customer/showbyprojectid/{id}",
     *      operationId="getCustomerByProjectId",
     *      tags={"Customer"},
     *      summary="Get One Customer By one Project Id",
     *      description="Return One Customer",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Customer Id",
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
        return $this->ColabroatorQuery->showByProjectId($request, $id);
    }
}
