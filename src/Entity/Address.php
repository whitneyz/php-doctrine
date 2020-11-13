<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
/** @ORM\Embeddable */
class Address
{
    /** @ORM\Column(type="string") * */
    private $street;

    /** @ORM\Column(type="string") * */
    private $streetNumber;

    /** @ORM\Column(type="string") * */
    private $city;

    /** @ORM\Column(type="string") * */
    private $zipcode;

    public function __construct(string $street, int $streetNumber, string $city, int $zipcode)
    {
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->city = $city;
        $this->zipcode = $zipcode;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    public function getStreetNumber(): int
    {
        return $this->streetNumber;
    }

    public function setStreetNumber(int $streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    public function setZipcode(int $zipcode)
    {
        $this->zipcode = $zipcode;
    }
}