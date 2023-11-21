<?php

/**
 * @OA\Schema(
 *      title="ProjectIndex",
 *      description="ProjectIndex body data",
 *      type="object"
 * )
 */
class ProjectIndex
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Project",
     *      example="Name Project"
     * )
     *
     * @var string
     */
    public $name;

    

}
