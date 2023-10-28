<?php

/**
 * @OA\Schema(
 *      title="Project",
 *      description="Project body data",
 *      type="object"
 * )
 */
class Project
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Module",
     *      example="Name Module"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="price",
     *      description="Price of the Project",
     *      example="Price Project"
     * )
     *
     * @var numeric
     */
    public $price;

    /**
     * @OA\Property(
     *      title="date_init",
     *      description="Date_init of the Project",
     *      example="Date_init Project"
     * )
     *
     * @var date
     */
    public $date_init;

    /**
     * @OA\Property(
     *      title="date_closed",
     *      description="Date_closed of the Project",
     *      example="Date_closed Project"
     * )
     *
     * @var date
     */
    public $date_closed;

    /**
     * @OA\Property(
     *      title="address",
     *      description="Address of the Project",
     *      example="Address Project"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="quotion",
     *      description="Quotion of the Project",
     *      example="Quotion Project"
     * )
     *
     * @var string
     */
    public $quotion;

    /**
     * @OA\Property(
     *      title="goal",
     *      description="Goal of the Project",
     *      example="Goal Project"
     * )
     *
     * @var string
     */
    public $goal;

    /**
     * @OA\Property(
     *      title="photo",
     *      description="photo of the Project",
     *      example="photo Project"
     * )
     *
     * @var string
     */
    public $photo;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Project",
     *      example="Description Project"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="focus",
     *      description="Focus of the Project",
     *      example="Focus Project"
     * )
     *
     * @var boolean
     */
    public $focus;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Project",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

}
