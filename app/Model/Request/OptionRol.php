<?php

/**
 * @OA\Schema(
 *      title="OptionRol",
 *      description="OptionRol body data",
 *      type="object"
 * )
 */
class OptionRol
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the OptionRol",
     *      example="Name OptionRol"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the OptionRol",
     *      example="Description OptionRol"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the OptionRol",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

    /**
     * @OA\Property(
     *      title="id_rol",
     *      description="id_rol of the OptionRol",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $id_rol;

    /**
     * @OA\Property(
     *      title="id_option",
     *      description="id_option of the OptionRol",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $id_option;

}
