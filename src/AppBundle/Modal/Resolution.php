<?php

namespace AppBundle\Modal;

use JMS\Serializer\Annotation as JMS;

class Resolution {
    
    /**
     * @JMS\Type("string")
     * @JMS\Accessor(setter="setDatetime") 
     */
    private $datetime;
    
    public function setDatetime($datetime){
        preg_match('/(\d{10})(\d{2})([\+\-]\d{4})/', $datetime, $matches);
        $dt = \DateTime::createFromFormat("U.u.O",vsprintf('%2$s.%3$s.%4$s', $matches));
        $this->datetime = $dt->format('Y-m-d H:i:s');
    }
    
    
}
