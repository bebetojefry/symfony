<?php

namespace AppBundle\Modal;

use JMS\Serializer\Annotation as JMS;

class Person
{
    /**
     * @JMS\Type("integer")
     */
    private $age;
    
    /**
     * @JMS\Type("string")
     */
    private $name;
    
    /**
     * @JMS\Type("boolean")
     */
    private $sportsman;

    // Getters
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    // Issers
    public function isSportsman()
    {
        return $this->sportsman;
    }

    // Setters
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setSportsman($sportsman)
    {
        $this->sportsman = $sportsman;
    }
}
