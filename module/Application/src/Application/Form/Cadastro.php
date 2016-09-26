<?php

namespace Application\Form;

use Zend\Form\Form;

class Cadastro extends Form
{

    public function __construct()
    {
        parent::__construct('formUsuarios');
        $this->setAttribute('method', 'post');
        $this->setAttribute('class', 'form');
        
        $this->add(array(
            'name' => 'descricao',
            'attributes' => array(
                'type'      => 'text',
                'class'     => 'form-control',
                'id'        => 'descricao',
            ),
            'options' => array(
                'label' => "Descrição: ",
            ),
        ));
        
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'class' => 'btn btn-success',
                'type' => 'submit',
                'value' => 'Cadastrar',
            ),
        ));
    }
    
    

}
