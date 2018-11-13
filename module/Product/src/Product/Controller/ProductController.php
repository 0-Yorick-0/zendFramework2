<?php

namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Model\ProductEntity;
use Product\Form\CreateProduct;

class ProductController extends AbstractActionController
{

    public function indexAction()
    {
        $form = new CreateProduct();
        $product = new ProductEntity();
        $form->bind($product);

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());
            // var_dump($form);
            // die();
            if ($form->isValid()) {
                var_dump($form->getObject());
                die();
            }
        }else {
            $messages = $form->getMessages();
            var_dump($messages);
        }
        return array(
            'form' => $form,
        );
    }
}

