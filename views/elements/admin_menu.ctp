<p>Hi <?php echo $session->read('Auth.User.name'); ?>, You are currently logged in as the Administrator. You can <?php echo $html->link('Log out', array('controller' => 'users','action'=>'admin_logout','admin' => true)); ?> here.</p>
<br />
<p>
<li> <?php echo $html->link('Manage Books', array('controller' => 'books', 
	'action' => 'index',
	'admin' => true )); ?> </li>
<li> <?php echo $html->link('Manage Users', array('controller' => 'users', 
	'action' => 'index',
	'admin' => true )); ?> </li>
</p>
