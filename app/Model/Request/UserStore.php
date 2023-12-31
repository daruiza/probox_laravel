<?php

/**
 * @OA\Schema(
 *      title="UserStore",
 *      description="User body data",
 *      type="object"
 * )
 */
class UserStore
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the user",
     *      example="super"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="super@yopmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="address",
     *      description="Address of the user",
     *      example="Cll1#1-1"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="location",
     *      description="location of the address user",
     *      example="{}"
     * )
     *
     * @var string
     */
    public $location;

    

    /**
     * @OA\Property(
     *      title="password",
     *      description="Password of the user",
     *      example="0000"
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *      title="lastname",
     *      description="Lastname of the user",
     *      example="LastName"
     * )
     *
     * @var string
     */
    public $lastname;

    /**
     * @OA\Property(
     *      title="phone",
     *      description="phone of the user",
     *      example=3194062550
     * )
     *
     * @var numeric
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="theme",
     *      description="theme of the user",
     *      example="red"
     * )
     *
     * @var string
     */
    public $theme;

    /**
     * @OA\Property(
     *      title="photo",
     *      description="photo of the user",
     *      example="avatar"
     * )
     *
     * @var string
     */
    public $photo;

    /**
     * @OA\Property(
     *      title="chexk_digit",
     *      description="chexk_digit of the user",
     *      example=2
     * )
     *
     * @var numeric
     */
    public $chexk_digit;

    /**
     * @OA\Property(
     *      title="nacionality",
     *      description="nacionality of the user",
     *      example="Venezuela"
     * )
     *
     * @var string
     */
    public $nacionality;

    /**
     * @OA\Property(
     *      title="birthdate",
     *      description="birthdate of the user",
     *      example="1980-01-01"
     * )
     *
     * @var date
     */
    public $birthdate;

    /**
     * @OA\Property(
     *      title="rol_id",
     *      description="rol_id of the user",
     *      example=1
     * )
     *
     * @var numeric
     */
    public $rol_id;
}
