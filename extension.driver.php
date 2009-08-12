<?php
	
	class extension_configuration extends Extension {
		public function about() {
			return array(
				'name'			=> 'Configuration Settings',
				'version'		=> '1.1',
				'release-date'	=> '2009-08-11',
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
					'location' => 200,
					'name' => 'Configuration',
					'link'	=> '/settings/edit/'
				)
			);
		}

		public function getSubscribedDelegates(){
			return array(
				array(
					'page' => '/system/preferences/',
					'delegate' => 'AddCustomPreferenceFieldsets',
					'callback' => 'appendPreferences'
				),

				array(
					'page' => '/system/preferences/',
					'delegate' => 'Save',
					'callback' => '__SavePreferences'
				)
			);
		}

		public function __SavePreferences(){
			$settings = $_POST['settings'];

			$setting_group = 'general';
			$setting_name = 'sitename';
			$setting_value = $settings['general']['sitename'];

			$this->_Parent->Configuration->set($setting_name, $setting_value, $setting_group);
			$this->_Parent->saveConfig();

		}
		
		public function appendPreferences($context){
			$group1 = new XMLElement('fieldset');
			$group1->setAttribute('class', 'settings');
			$group1->appendChild(new XMLElement('legend', 'Version'));	

			$useragent = $this->_Parent->Configuration->get('useragent', 'general');
			$label1 = new XMLElement('p', $useragent);			
			
			$group1->appendChild($label1);						
			$context['wrapper']->appendChild($group1);

			$group2 = new XMLElement('fieldset');
			$group2->setAttribute('class', 'settings');
			$group2->appendChild(new XMLElement('legend', 'Site Name'));			

			$sitename = $this->_Parent->Configuration->get('sitename', 'general');
			$label2 = new XMLElement('label', 'Website Name');			
			$label2->appendChild(Widget::Input('settings[general][sitename]', $sitename, 'text'));
			
			$group2->appendChild($label2);						
			$context['wrapper']->appendChild($group2);

		}
	}
	
?>