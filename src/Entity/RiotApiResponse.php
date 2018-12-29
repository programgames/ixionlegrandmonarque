<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 29/12/2018
 * Time: 16:41
 */

namespace App\Entity;


class RiotApiResponse
{
    /** @var boolean */
    private $error;

    private $data;

    /**
     * RiotApiResponse constructor.
     * @param $data
     * @param $error
     */
    public function __construct($data,$error)
    {
        $this->data = $data;
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return bool
     */
    public function isError(): bool
    {
        return $this->error;
    }

    /**
     * @param bool $error
     */
    public function setError(bool $error): void
    {
        $this->error = $error;
    }


}