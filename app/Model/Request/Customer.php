<?php

/**
 * @OA\Schema(
 *      title="Customer",
 *      description="Customer body data",
 *      type="object"
 * )
 */
class Customer
{
    /**
     * @OA\Property(
     *      title="is owner",
     *      description="is owner of the Customer",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $is_owner;

    /**
     * @OA\Property(
     *      title="user_id",
     *      description="User Customer on the Proyect",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $user_id;

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="Proyect of the Customer",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;


}
