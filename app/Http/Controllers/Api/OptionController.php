<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IOptionQuery;

class OptionController extends Controller
{

    private $OptionQuery;

    public function __construct(IOptionQuery $OptionQuery)
    {
        $this->OptionQuery = $OptionQuery;
    }

    /**
     * Listado de todos los Options
     * @OA\Get(
     *      path="/option/index",
     *      operationId="getOption",
     *      tags={"Option"},
     *      summary="Get All Option",
     *      description="Return Option",
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
        return $this->OptionQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/option/store",
     *      operationId="storeOption",
     *      tags={"Option"},
     *      summary="Store Option",
     *      description="Store Option",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Option")
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
        return $this->OptionQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/option/showbyoptionid/{id}",
     *      operationId="getOptionById",
     *      tags={"Option"},
     *      summary="Get One Option By one Id",
     *      description="Return One Option",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Option Id",
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
     public function showByOptionId(Request $request, $id)
     {
         return $this->OptionQuery->showByOptionId($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/option/update/{id}",
     *      operationId="getUpdateOptionById",
     *      tags={"Option"},
     *      summary="Update One Option By one Id",
     *      description="Update One Option",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Option Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/Option")
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
         return $this->OptionQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/option/destroy/{id}",
      *      operationId="getDestroyOptionById",
      *      tags={"Option"},
      *      summary="Delete One Option By one Id",
      *      description="Delete One Option",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="Option Id",
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
         return $this->OptionQuery->destroy($request, $id);
     }

     /**
     * @OA\Get(
     *      path="/option/showoptionbymoduleid/{id_module}",
     *      operationId="getOptionByModuleId",
     *      tags={"Option"},
     *      summary="Get One Option By one Id Module",
     *      description="Return One Option by Id Module",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id_module",
     *          description="Option by Id Module",
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
    public function showOptionByModuleId(Request $request, $id)
    {
        return $this->OptionQuery->showOptionByModuleId($request, $id);
    }
 }
 