<?php

/**
 * @OA\Schema(
 *      title="Option",
 *      description="Option body data",
 *      type="object"
 * )
 */
class Option
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Option",
     *      example="Name Option"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="description",
     *      description="Description of the Option",
     *      example="Description Option"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="label",
     *      description="Label of the Option",
     *      example="Label Option"
     * )
     *
     * @var string
     */
    public $label;

    /**
     * @OA\Property(
     *      title="active",
     *      description="Active of the Option",
     *      example=true
     * )
     *
     * @var boolean
     */
    public $active;

    /**
     * @OA\Property(
     *      title="id_module",
     *      description="id_module of the Option",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $id_module;

}
