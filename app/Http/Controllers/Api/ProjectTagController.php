<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Query\Abstraction\IProjectTagQuery;

class ProjectTagController extends Controller
{

    private $ProjectTagQuery;

    public function __construct(IProjectTagQuery $ProjectTagQuery)
    {
        $this->ProjectTagQuery = $ProjectTagQuery;
    }

    /**
     * @OA\Post(
     *      path="/projecttag/store",
     *      operationId="storeProjectTag",
     *      tags={"ProjectTag"},
     *      summary="Store ProjectTag",
     *      description="Store ProjectTag",
     *      security={ {"bearer": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/ProjectTag")
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
        return $this->ProjectTagQuery->store($request);
    }

    /**
     * @OA\Get(
     *      path="/projecttag/showtagsbyprojectid/{id}",
     *      operationId="getTagsByProjectId",
     *      tags={"ProjectTag"},
     *      summary="Get One ProjectTag By one Id",
     *      description="Return One ProjectTag",
     *      security={ {"bearer": {} }},     
     *      @OA\Parameter(
     *          name="id",
     *          description="Project Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="category",
     *          description="category",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
    public function showTagsByProjectId(Request $request, $id)
    {
        return $this->ProjectTagQuery->showTagsByProjectId($request, $id);
    }

    /**
     * @OA\Delete(
     *      path="/projecttag/destroy/{id}",
     *      operationId="getDestroyTagById",
     *      tags={"ProjectTag"},
     *      summary="Delete One ProjectTag By one Id",
     *      description="Delete One ProjectTag",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="ProjectTag Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="project_id",
     *          description="Optional project_id",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="default",
     *          description="Optional default tags",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="boolean"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="return_all",
     *          description="Optional return_all tags",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="boolean"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="return_category",
     *          description="Optional return_category tags",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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
        return $this->ProjectTagQuery->destroy($request, $id);
    }


    /**
     * @OA\Get(
     *      path="/projecttag/showprojectbyid/{id}",
     *      operationId="getShowProjectById",
     *      tags={"ProjectTag"},
     *      summary="Get One ProjectTag By one Id",
     *      description="Return One ProjectTag by Id",
     *      security={ {"bearer": {} }},
     *      @OA\Parameter(
     *          name="id",
     *          description="Show ProjectTag by Id",
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
    public function showProjectTagById(Request $request, int $id)
    {
        return $this->ProjectTagQuery->showProjectTagById($request, $id);
    }
}
