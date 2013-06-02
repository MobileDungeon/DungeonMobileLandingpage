<?php

namespace Application\Form;


use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Form\Form;

class Signup extends Form
{
    /**
     * @param array $options OPTIONAL
     */
    public function __construct (array $options = array())
    {
        parent::__construct('event_edit', $options);
        
        $this->setHydrator(new ClassMethods());
        
        $email = new Text('Email');
        $email->setLabel('Email')
              ->setAttribute('required', 'required');
        
        
        $submit = new Submit('submit');
            
        $this->add($submit)
             ->add($email);
    }
}