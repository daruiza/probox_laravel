<?php

/**
 * @OA\Schema(
 *      title="Note",
 *      description="Note body data",
 *      type="object"
 * )
 */
class Note
{

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description Note on the Proyect",
     *      example="Note about proyect"
     * )
     *
     * @var string
     */
    public $description;


    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the Note",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="focus",
     *      description="focus of the Note",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $focus;    

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="Proyect of the Note",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;


}
