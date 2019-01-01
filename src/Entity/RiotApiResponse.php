<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 29/12/2018
 * Time: 16:41.
 */

namespace App\Entity;

class RiotApiResponse
{
    /** @var [] */
    private $data;

    /** @var int */
    private $httpCode;

    /**
     * RiotApiResponse constructor.
     *
     * @param $data
     * @param int $httpCode
     */
    public function __construct($data, int $httpCode)
    {
        $this->data = $data;
        $this->setHttpCode($httpCode);
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
     * @return int
     */
    public function getHttpCode(): int
    {
        return $this->httpCode;
    }

    /**
     * @param int $httpCode
     */
    public function setHttpCode(int $httpCode): void
    {
        $this->httpCode = $httpCode;
    }
}
