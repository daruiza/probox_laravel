<?php

/**
 * @OA\Schema(
 *      title="Tag",
 *      description="Tag body data",
 *      type="object"
 * )
 */
class Tag
{

     /**
     * @OA\Property(
     *      title="category",
     *      description="category of the Tag",
     *      example="category Tag"
     * )
     *
     * @var string
     */
    public $category;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Tag",
     *      example="Name Tag"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="active",
     *      description="active of the Tag",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $active;  
   


}
