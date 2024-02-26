<?php

/**
 * @OA\Schema(
 *      title="ProjectTag",
 *      description="ProjectTag body data",
 *      type="object"
 * )
 */
class ProjectTag
{

    /**
     * @OA\Property(
     *      title="tag_id",
     *      description="tag_id of the ProjectTag",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $tag_id;

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="project_id of the ProjectTag",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;

    /**
     * @OA\Property(
     *      title="return_all",
     *      description="return all tags on the project id",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $return_all;

    /**
     * @OA\Property(
     *      title="return_category",
     *      description="return_category of the ProjectTag, after store",
     *      example="status"
     * )
     *
     * @var string
     */
    public $return_category;
}
