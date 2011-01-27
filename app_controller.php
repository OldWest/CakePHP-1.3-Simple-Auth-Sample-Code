<?php 
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {
	
// Added by Jason Wydro: Simple Auth CakePHP v1.0
var $components = array('Auth','Session');

	function beforeFilter() {
		$this->Auth->loginAction = array('admin' => false, 'controller' => 'users', 'action' => 'login');
		
		$this->Auth->loginRedirect = array('admin' => false, 'controller' => 'books', 'action' => 'index');
		
		$this->Auth->allow('display');
	}
	
/* This function is used to store Auth data about the user on the site. It reads from the Session key to see if a User is actually logged in. If so, it stores the data in $user (i think).
	This is the code used in default.cpt to show the links if or if not the user is logged in 
	if (!empty($user)) echo $html->link('Logout', array('controller' => 'users','action'=>'admin_logout','admin' => true)); */

	public function beforeRender() { 
        if (!array_key_exists('requested', $this->params)) { 
                $user = $this->Session->read($this->Auth->sessionKey); 
                $this->set(compact('user')); 
        } 
} 

	// End
	
}
