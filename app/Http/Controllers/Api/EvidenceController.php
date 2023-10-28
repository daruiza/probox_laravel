<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IEvidenceQuery;

class EvidenceController extends Controller
{

    private $EvidenceQuery;

    public function __construct(IEvidenceQuery $EvidenceQuery)
    {
        $this->EvidenceQuery = $EvidenceQuery;
    }

    /**
     * Listado de todos los EVIDENCE
     * @OA\Get(
     *      path="/evidence/index",
     *      operationId="getEvidence",
     *      tags={"Evidence"},
     *      summary="Get All Evidence",
     *      description="Return Evidence",
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
        return $this->EvidenceQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/evidence/store",
     *      operationId="storeEvidence",
     *      tags={"Evidence"},
     *      summary="Store Evidence",
     *      description="Store Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Evidence")
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
        return $this->EvidenceQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/evidence/showbyid/{id}",
     *      operationId="getEvidenceById",
     *      tags={"Evidence"},
     *      summary="Get One Evidence By one Id",
     *      description="Return One Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
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
         return $this->EvidenceQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/evidence/update/{id}",
     *      operationId="getUpdateEvidenceById",
     *      tags={"Evidence"},
     *      summary="Update One Evidence By one Id",
     *      description="Update One Evidence",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Evidence Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Evidence")
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
         return $this->EvidenceQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/evidence/destroy/{id}",
      *      operationId="getDestroyEvidenceById",
      *      tags={"Evidence"},
      *      summary="Delete One Evidence By one Id",
      *      description="Delete One Evidence",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Evidence Id",
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
         return $this->EvidenceQuery->destroy($request, $id);
     }

     /**
     * @OA\Get(
     *      path="/evidence/showtaskbyid/{id}",
     *      operationId="getShowTaskById",
     *      tags={"Evidence"},
     *      summary="Get One Task By one Id",
     *      description="Return One Task by Id",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Show Task by Id",
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
    public function showTaskById(Request $request, int $id)
    {
        return $this->EvidenceQuery->showTaskById($request, $id);
    }

 }
 