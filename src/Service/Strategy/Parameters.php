<?php

namespace App\Service\Strategy;

class Parameters
{
    /** @var null|int $x */
    private $x;
    /** @var null|int $y */
    private $y;
    /** @var null|string $z */
    private $z;
    /** @var null|int $width */
    private $width;
    /** @var null|int $height */
    private $height;
    /** @var null|string $instruction */
    private $instruction;

    /**
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->x;
    }

    /**
     * @param int|null $x
     *
     * @return Parameters
     */
    public function setX(?int $x): Parameters
    {
        $this->x = $x;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * @param int|null $y
     *
     * @return Parameters
     */
    public function setY(?int $y): Parameters
    {
        $this->y = $y;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getZ(): ?string
    {
        return $this->z;
    }

    /**
     * @param string|null $z
     *
     * @return Parameters
     */
    public function setZ(?string $z): Parameters
    {
        $this->z = $z;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * @param int|null $width
     *
     * @return Parameters
     */
    public function setWidth(?int $width): Parameters
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * @param int|null $height
     *
     * @return Parameters
     */
    public function setHeight(?int $height): Parameters
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    /**
     * @param string|null $instruction
     *
     * @return Parameters
     */
    public function setInstruction(?string $instruction): Parameters
    {
        $this->instruction = $instruction;
        return $this;
    }
}