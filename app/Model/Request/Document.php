<?php

/**
 * @OA\Schema(
 *      title="Document",
 *      description="Document body data",
 *      type="object"
 * )
 */
class Document
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the Document",
     *      example="Name Document"
     * )
     *
     * @var string
     */
    public $name;

     /**
     * @OA\Property(
     *      title="file",
     *      description="file of the Document",
     *      example="file Document"
     * )
     *
     * @var string
     */
    public $file;
   

    /**
     * @OA\Property(
     *      title="type",
     *      type="Type of the Document on the Proyect",
     *      example="Type about Document"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Description Document on the Proyect",
     *      example="Description about Document"
     * )
     *
     * @var string
     */
    public $description;

    
    /**
     * @OA\Property(
     *      title="approved",
     *      description="approved of the Document",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $approved;


    /**
     * @OA\Property(
     *      title="focus",
     *      description="focus of the Document",
     *      example=false
     * )
     *
     * @var boolean
     */
    public $focus;    

    /**
     * @OA\Property(
     *      title="project_id",
     *      description="Proyect of the Document",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $project_id;


}
