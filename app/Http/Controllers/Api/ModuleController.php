<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IModuleQuery;

class ModuleController extends Controller
{

    private $ModuleQuery;

    public function __construct(IModuleQuery $ModuleQuery)
    {
        $this->ModuleQuery = $ModuleQuery;
    }

    /**
     * Listado de todos los Modulos
     * @OA\Get(
     *      path="/module/index",
     *      operationId="getModule",
     *      tags={"Module"},
     *      summary="Get All Module",
     *      description="Return Module",
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
        return $this->ModuleQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/module/store",
     *      operationId="storeModule",
     *      tags={"Module"},
     *      summary="Store Module",
     *      description="Store Module",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Module")
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
        return $this->ModuleQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/module/showbyid/{id}",
     *      operationId="getModuleById",
     *      tags={"Module"},
     *      summary="Get One Module By one Id",
     *      description="Return One Module",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Module Id",
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
         return $this->ModuleQuery->showById($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/module/update/{id}",
     *      operationId="getUpdateModuleById",
     *      tags={"Module"},
     *      summary="Update One Module By one Id",
     *      description="Update One Module",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Module Id",
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
         return $this->ModuleQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/module/destroy/{id}",
      *      operationId="getDestroyModuleById",
      *      tags={"Module"},
      *      summary="Delete One Module By one Id",
      *      description="Delete One Module",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Module Id",
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
         return $this->ModuleQuery->destroy($request, $id);
     }

     /**
     * @OA\Get(
     *      path="/module/showoptionbyid/{id}",
     *      operationId="getShowOptionById",
     *      tags={"Module"},
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
     public function showOptionById(Request $request, $id)
     {
         return $this->ModuleQuery->showOptionById($request, $id);
     }
 }
 