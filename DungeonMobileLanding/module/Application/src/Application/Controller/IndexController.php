<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            
            $mailValidator = new \Zend\Validator\EmailAddress();
            
            if (! $mailValidator->isValid($this->getRequest()
                ->getPost()
                ->get('email'))) {
                echo "email address is not valid";
                break;
            } else {
                $email = $this->getRequest()
                    ->getPost()
                    ->get('email');
                
                $dbAdapter = $this->getServiceLocator()->get('dbAdapter');
                
                $sql = "INSERT INTO interests (
                     email , created
                ) VALUES (
                 '$email', NOW()
                );";
                
                $query = $dbAdapter->query($sql);
                $query->execute();
                $this->redirect()->toUrl('/index.php/application/index/thanks');
            }
        } 
        return new ViewModel();
    }
    
    
    
    public function thanksAction()
    {
        return new ViewModel();
    }
}
