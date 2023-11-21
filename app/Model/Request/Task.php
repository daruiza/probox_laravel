<?php

/**
 * @OA\Schema(
 *      title="Task",
 *      description="Task body data",
 *      type="object"
 * )
 */
class Task
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Task",
     *      example="Name Task"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Task",
     *      example="Description Task"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="date_init",
     *      description="Date_init of the Task",
     *      example="Date_init Task"
     * )
     *
     * @var date
     */
    public $date_init;

    /**
     * @OA\Property(
     *      title="date_closed",
     *      description="Date_closed of the Task",
     *      example="Date_closed Task"
     * )
     *
     * @var date
     */
    public $date_closed;

    /**
     * @OA\Property(
     *      title="focus",
     *      description="Focus of the Task",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $focus;

        /**
     * @OA\Property(
     *      title="id_task",
     *      description="Id_task of the Task",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $id_task;

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="Project_id of the Task",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;

}
