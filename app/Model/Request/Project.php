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
     *      example=1500
     * )
     *
     * @var numeric
     */
    public $price;

    /**
     * @OA\Property(
     *      title="date_init",
     *      description="Date_init of the Project",
     *      example="1980-01-01"
     * )
     *
     * @var date
     */
    public $date_init;

    /**
     * @OA\Property(
     *      title="date_closed",
     *      description="Date_closed of the Project",
     *      example="1980-07-01"
     * )
     *
     * @var date
     */
    public $date_closed;

    /**
     * @OA\Property(
     *      title="address",
     *      description="Address of the Project",
     *      example="Avenu15#45-78"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="quotation",
     *      description="quotation of the Project",
     *      example="quotation Project"
     * )
     *
     * @var string
     */
    public $quotation;

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
     *      example=false
     * )
     *
     * @var boolean
     */
    public $focus;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Project",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $active;

}
