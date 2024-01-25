<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IDocumentQuery;

class DocumentController extends Controller
{
    private $DocumentQuery;

    public function __construct(IDocumentQuery $DocumentQuery)
    {
        $this->DocumentQuery = $DocumentQuery;
    }

    /**
     * Listado de todos los Documentos
     * @OA\Get(
     *      path="/document/index",
     *      operationId="getDocuments",
     *      tags={"Document"},
     *      summary="Get All Documents",
     *      description="Return Documents",
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
        return $this->DocumentQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/document/store",
     *      operationId="storeDocument",
     *      tags={"Document"},
     *      summary="Store Document",
     *      description="Store Document",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Document")
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
        return $this->DocumentQuery->store($request);
    }


    /**
     * @OA\Put(
     *      path="/document/update/{id}",
     *      operationId="getUpdateDocumentById",
     *      tags={"Document"},
     *      summary="Update One Document By one Id",
     *      description="Update One Document",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Document Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Document")
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
        return $this->DocumentQuery->update($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/document/destroy/{id}",
     *      operationId="getDestroyDocumentById",
     *      tags={"Document"},
     *      summary="Delete One Document By one Id",
     *      description="Delete One Document",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Document Id",
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
        return $this->DocumentQuery->destroy($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/document/showbyid/{id}",
     *      operationId="getDocumentById",
     *      tags={"Document"},
     *      summary="Get One Document By one Id",
     *      description="Return One Document",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Document Id",
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
        return $this->DocumentQuery->showById($request, $id);
    }

     /**
     * @OA\Get(
     *      path="/document/showbyprojectid/{id}",
     *      operationId="getDocumentByProjectId",
     *      tags={"Document"},
     *      summary="Get One Document By one Project Id",
     *      description="Return One Document",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Document Id",
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
        return $this->DocumentQuery->showByProjectId($request, $id);
    }
}
