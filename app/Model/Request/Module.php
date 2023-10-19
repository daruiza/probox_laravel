<?php

/**
 * @OA\Schema(
 *      title="Module",
 *      description="Module body data",
 *      type="object"
 * )
 */
class Module
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
     *      title="description",
     *      description="Description of the Module",
     *      example="Description Module"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="label",
     *      description="Label of the Module",
     *      example="Label Module"
     * )
     *
     * @var string
     */
    public $label;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Module",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

}
