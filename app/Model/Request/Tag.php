<?php

/**
 * @OA\Schema(
 *      title="Tag",
 *      description="Tag body data",
 *      type="object"
 * )
 */
class Tag
{

    /**
     * @OA\Property(
     *      title="category",
     *      description="category of the Tag",
     *      example="status"
     * )
     *
     * @var string
     */
    public $category;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Tag",
     *      example="Name Tag"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="class",
     *      description="Class of the Tag",
     *      example="Class Tag"
     * )
     *
     * @var string
     */
    public $class;

    /**
     * @OA\Property(
     *      title="default",
     *      description="default of the Tag",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $default;

    /**
     * @OA\Property(
     *      title="active",
     *      description="active of the Tag",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="project_id of the Project",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;

    /**
     * @OA\Property(
     *      title="return_all",
     *      description="return all tags on the project id, after store",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $return_all;

    /**
     * @OA\Property(
     *      title="return_category",
     *      description="return_category of the Tag, after store",
     *      example="status"
     * )
     *
     * @var string
     */
    public $return_category;
}
