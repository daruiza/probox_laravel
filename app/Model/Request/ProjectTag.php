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
}
