<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IOptionRolQuery;

class OptionRolController extends Controller
{

    private $OptionRolQuery;

    public function __construct(IOptionRolQuery $OptionRolQuery)
    {
        $this->OptionRolQuery = $OptionRolQuery;
    }

    /**
     * Listado de todos los OptionsRols
     * @OA\Get(
     *      path="/optionrol/index",
     *      operationId="getOption",
     *      tags={"OptionRol"},
     *      summary="Get All OptionRol",
     *      description="Return OptionRol",
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
        return $this->OptionRolQuery->index($request);
    }

    /**
     * @OA\Post(
     *      path="/optionrol/store",
     *      operationId="storeOptionRol",
     *      tags={"OptionRol"},
     *      summary="Store OptionRol",
     *      description="Store OptionRol",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/OptionRol")
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
        return $this->OptionRolQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/optionrol/showbyoptionrolid/{id}",
     *      operationId="getOptionRolById",
     *      tags={"OptionRol"},
     *      summary="Get One OptionRol By one Id",
     *      description="Return One OptionRol",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="OptionRol Id",
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
     public function showByOptionRolId(Request $request, $id)
     {
         return $this->OptionRolQuery->showByOptionRolId($request, $id);
     }
 
     /**
     * @OA\Put(
     *      path="/optionrol/update/{id}",
     *      operationId="getUpdateOptionRolById",
     *      tags={"OptionRol"},
     *      summary="Update One OptioRol By one Id",
     *      description="Update One OptionRol",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="OptionRol Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *       @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/OptionRol")
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
         return $this->OptionRolQuery->update($request, $id);
     }
 
     /**
      * @OA\Delete(
      *      path="/optionrol/destroy/{id}",
      *      operationId="getDestroyOptionRolById",
      *      tags={"OptionRol"},
      *      summary="Delete One OptionRol By one Id",
      *      description="Delete One OptionRol",
      *      security={ {"bearer": {} }},
      *      @OA\Parameter(
      *          name="id",
      *          description="OptionRol Id",
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
         return $this->OptionRolQuery->destroy($request, $id);
     }

 }
 