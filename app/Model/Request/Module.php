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
     *      example="Tags"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Module",
     *      example="Description tags"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="label",
     *      description="Label of the Module",
     *      example="Example"
     * )
     *
     * @var string
     */
    public $label;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Module",
     *      example="Example"
     * )
     *
     * @var boolean
     */
    public $active;

}
