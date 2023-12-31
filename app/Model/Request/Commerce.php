<?php

/**
 * @OA\Schema(
 *      title="Commerce",
 *      description="Commerce body data",
 *      type="object"
 * )
 */
class Commerce
{    

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Commerce",
     *      example="Name Commerce"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="phone",
     *      description="Phone of the Commerce",
     *      example="Phone Commerce"
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="address",
     *      description="Address of the Commerce",
     *      example="Address Commerce"
     * )
     *
     * @var string
     */
    public $address;

     /**
     * @OA\Property(
     *      title="description",
     *      description="description of the Commerce",
     *      example="description Commerce"
     * )
     *
     * @var string
     */
    public $description;

     /**
     * @OA\Property(
     *      title="logo",
     *      description="logo of the Commerce",
     *      example="logo Commerce"
     * )
     *
     * @var string
     */
    public $logo;


     /**
     * @OA\Property(
     *      title="active",
     *      description="active of the Commerce",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $active;  
   


}
