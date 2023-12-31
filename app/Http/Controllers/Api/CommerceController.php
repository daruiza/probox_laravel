<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\ICommerceQuery;

class CommerceController extends Controller
{
    private $CommerceQuery;

    public function __construct(ICommerceQuery $CommerceQuery)
    {
        $this->CommerceQuery = $CommerceQuery;
    }

    /**
     * Listado de todos los Commerces
     * @OA\Get(
     *      path="/commerce/index",
     *      operationId="getCommerce",
     *      tags={"Commerce"},
     *      summary="Get All Commerces",
     *      description="Return Commerces",
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
        return $this->CommerceQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/commerce/store",
     *      operationId="storeCommerce",
     *      tags={"Commerce"},
     *      summary="Store Commerce",
     *      description="Store Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Commerce")
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
        return $this->CommerceQuery->store($request);
    }


    /**
     * @OA\Put(
     *      path="/commerce/update/{id}",
     *      operationId="getUpdateCommerceById",
     *      tags={"Commerce"},
     *      summary="Update One Commerce By one Id",
     *      description="Update One Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Commerce")
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
        return $this->CommerceQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/commerce/destroy/{id}",
     *      operationId="getDestroyCommerceById",
     *      tags={"Commerce"},
     *      summary="Delete One Commerce By one Id",
     *      description="Delete One Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce Id",
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
        return $this->CommerceQuery->destroy($request, $id);
    }

    /**
     * @OA\Get(
     *      path="/commerce/showbyid/{id}",
     *      operationId="getCommerceById",
     *      tags={"Commerce"},
     *      summary="Get One Commerce By one Id",
     *      description="Return One Commerce",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Commerce Id",
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
        return $this->CommerceQuery->showById($request, $id);
    }

}
