<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {  
        $serializer = $this->get('jms_serializer');
        $data = <<<EOF
<result>
  <age>26</age>
  <name><![CDATA[Bebeto]]></name>
  <sportsman>true</sportsman>
</result>
EOF;
        $person = $serializer->deserialize($data, 'AppBundle\Modal\Person', 'xml');
        // replace this example code with whatever you need
        return $this->render('AppBundle:default:index.html.twig', array(
            'person' => $person,
        ));
    }
    
    /**
     * @Route("/json", name="json_deserialize")
     */
    public function jsonAction(){
        $json = '{
            "datetime":"\/Date(9281640000000-0400)\/"
	}';
        
        $serializer = $this->get('jms_serializer');
        $resolution = $serializer->deserialize($json, 'AppBundle\Modal\Resolution', 'json');
        echo '<pre>';
        var_dump($resolution); exit;
    }
}
