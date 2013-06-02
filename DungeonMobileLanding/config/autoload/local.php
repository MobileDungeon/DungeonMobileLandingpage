<?php
return array(
		'service_manager' => array(
				'aliases' => array(
						'dbAdapter' => 'Zend\Db\Adapter\Adapter'
				),
				'factories' => array(
						'Zend\Db\Adapter\Adapter' => function ($sm)  {
							$adapter = new Zend\Db\Adapter\Adapter(array(
									'driver'    => 'pdo',
									'dsn'       => 'mysql:dbname=landing;host=127.8.153.129',
							        'database'  => 'landing',
									'username'  => 'adminryCBqiI',
									'password'  => '6xVMU9h6vDx1',
									'hostname'  => '127.8.153.129',
							         
									'driver_options' => array(
											PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
									),
							));

							return $adapter;
						},
						'Navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory'
								),
								'initializers' => array(
										'dbAdapter' => function($service, $sm) {
											if ($service instanceof \Zend\Db\Adapter\AdapterAwareInterface) {
												$adapter = $sm->get('dbAdapter');
												$service->setDbAdapter($adapter);
											}
										}
								),
		),
);
