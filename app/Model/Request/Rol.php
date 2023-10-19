<?php

/**
 * @OA\Schema(
 *      title="Rol",
 *      description="Rol body data",
 *      type="object"
 * )
 */
class Rol
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Rol",
     *      example="Name Rol"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Rol",
     *      example="Description Rol"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Rol",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

}
