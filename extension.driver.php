<?php
	
	class extension_configuration extends Extension {
		public function about() {
			return array(
				'name'			=> 'Configuration Settings',
				'version'		=> '1.0',
				'release-date'	=> '2009-01-02',
				'author'		=> array(
					'name'			=> 'Stephen Bau',
					'website'		=> 'http://www.domain7.com/',
					'email'			=> 'stephen@domain7.com'
				),
				'description'	=> 'Admin interface for Symphony System Preferences'
	 		);
		}
		
		public function fetchNavigation(){ 
			return array(
				array(
					'location' => 400,
					'name' => 'Configuration',
					'children' => array(
						array(
							'name' => 'Overview',
							'link' => '/settings/'							
						),
						array(
							'name' => 'Edit Settings',
							'link' => '/settings/edit/'							
						)
					)
				)
			);
		}
	}
	
?>