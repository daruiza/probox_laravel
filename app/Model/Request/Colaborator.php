<?php

/**
 * @OA\Schema(
 *      title="Colaborator",
 *      description="Colaborator body data",
 *      type="object"
 * )
 */
class Colaborator
{
    /**
     * @OA\Property(
     *      title="activity rol",
     *      description="activity rol of the Colaborator",
     *      example="workman"
     * )
     *
     * @var string
     */
    public $activity_rol;

     /**
     * @OA\Property(
     *      title="date_start",
     *      description="date_start of the Colaborator",
     *      example="2020-07-01"
     * )
     *
     * @var date
     */
    public $date_start;

    /**
     * @OA\Property(
     *      title="date_departure",
     *      description="date_departure of the Colaborator",
     *      example="2021-07-01"
     * )
     *
     * @var date
     */
    public $date_departure;

    /**
     * @OA\Property(
     *      title="recommended",
     *      description="recommended of the Colaborator",
     *      example="Recoemndación"
     * )
     *
     * @var string
     */
    public $recommended;

    /**
     * @OA\Property(
     *      title="boss_name",
     *      description="boss_name of the Colaborator",
     *      example="Pedro"
     * )
     *
     * @var string
     */
    public $boss_name;    

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="User Colaborator on the Proyect",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="Proyect of the Colaborator",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;
}
