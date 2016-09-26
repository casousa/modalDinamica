<?php

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Application\Form\Cadastro as FormCadastro;
use Application\Model\Cadastro as ModelCadastro;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $view  = new ViewModel();
        $form  = new FormCadastro();
        
        $view->setVariables(array(
            'form' => $form,
        ));

        return $view;
    }
    
    public function cadastroAction()
    {
        $view  = new JsonModel();
        $model = new ModelCadastro();
        $form  = new FormCadastro();
        
        $request = $this->getRequest();
        
        if($request->isPost())
        {
            $postData = $this->getRequest()->getPost()->toArray();
            $form->setInputFilter($model->getInputFilter());
            $form->setData($postData);
            if($form->isValid()){
                $msg = 'Success';
                $this->flashMessenger()->addSuccessMessage('Ação realizada com Sucesso.');
            }
            else{
                $key = array_keys($form->getMessages('descricao'));
                $value = $form->getMessages('descricao');
                $msg = '<ul><li>'.$value[$key[0]].'</li></ul>';
                
            }
            
            return $view->setVariable('result', array('msg' => $msg));
        }
        
    }
}
