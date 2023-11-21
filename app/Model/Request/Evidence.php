<?php

/**
 * @OA\Schema(
 *      title="Evidence",
 *      description="Evidence body data",
 *      type="object"
 * )
 */
class Evidence
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Evidence",
     *      example="Name Evidence"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="file",
     *      description="File of the Evidence",
     *      example="File Evidence"
     * )
     *
     * @var string
     */
    public $file;

    /**
     * @OA\Property(
     *      title="type",
     *      description="Type of the Evidence",
     *      example="Type Evidence"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Evidence",
     *      example="Description Evidence"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="approved",
     *      description="Approved of the Evidence",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $approved;

    /**
     * @OA\Property(
     *      title="focus",
     *      description="Focus of the Evidence",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $focus;

    /**
     * @OA\Property(
     *      title="task_id",
     *      description="Task_id of the Evidence",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $task_id;

}
