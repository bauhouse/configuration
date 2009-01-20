<?php 

require_once(TOOLKIT . '/class.administrationpage.php');

define_safe('BASE_URL', URL . '/symphony/extension/configuration/settings');

Class contentExtensionConfigurationSettings extends AdministrationPage{

    private $_driver;
	private $_page;
	private $_flag;

    function __construct(&$parent){
        parent::__construct($parent);
		
        $this->_driver = $this->_Parent->ExtensionManager->create('configuration');
    }
	
	function view(){			
		$this->__switchboard();	
	}
	
	function action(){			
		$this->__switchboard('action');
		if (array_key_exists('save', $_POST['action'])) $this->save();
		if (array_key_exists('edit', $_POST['action'])) $this->edit();
	}

	function __switchboard($type='view'){

		$this->_page = $this->_context['0'];
		$this->_flag = $this->_context['1'];
	
		$function = ($type == 'action' ? '__action' : '__view') . (isset($this->_page) ? ucfirst($this->_page) : 'Index') ;
		
		if(!method_exists($this, $function)) {
			
			## If there is no action function, just return without doing anything
			if($type == 'action') return;
			
			$this->_Parent->errorPageNotFound();
			
		}
		
		$this->$function();

	}
	
	function __viewIndex(){			

		$link = new XMLElement('link');
		$link->setAttributeArray(array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => URL . '/extensions/configuration/assets/configuration.css'));
		$this->addElementToHead($link, 500);

		$this->setTitle('Symphony &ndash; Configuration Settings');
        $this->setPageType('table');

		$this->appendSubheading('Configuration Settings');
		
		## Table Headings
		$aTableHead = array(
			array('Group', 'col'),
			array('Setting', 'col'),
			array('Value', 'col')
		);			
		
		## Get Configuration Settings and display as a table list
		$config_settings = $this->_Parent->Configuration->get();

		$tableData = array();

		foreach($config_settings as $key => $groups)
		{
			foreach($groups as $name => $value) {
				$setting_group = $key;
				$setting_name = $name;
				$setting_value = $value;
			
				$tableData[] = Widget::TableData($setting_group);
				$tableData[] = Widget::TableData($setting_name);
				$tableData[] = Widget::TableData($setting_value);
			
				$aTableBody[] = Widget::TableRow($tableData, ($bEven ? 'even' : NULL));

				$bEven = !$bEven;
					
				unset($tableData);		
			}
		}

		$table = Widget::Table(Widget::TableHead($aTableHead), NULL, Widget::TableBody($aTableBody));
		$this->Form->appendChild($table);

		## Edit Button
		$tableActions = new XMLElement('div');
		$tableActions->setAttribute('class', 'actions');
		$tableActions->appendChild(Widget::Input('action[edit]', 'Edit Settings', 'submit'));
        $this->Form->appendChild($tableActions); 
	}

	function __viewEdit(){			
	
		$link = new XMLElement('link');
		$link->setAttributeArray(array('rel' => 'stylesheet', 'type' => 'text/css', 'media' => 'screen', 'href' => URL . '/extensions/configuration/assets/configuration.css'));
		$this->addElementToHead($link, 500);

        $this->setTitle('Symphony &ndash; Configuration &ndash; Edit Settings');
        $this->setPageType('table');

		$this->appendSubheading('Edit Configuration Settings');

		## Table Headings
		$aTableHead = array(
			array('Group', 'col'),
			array('Setting', 'col'),
			array('Value', 'col')
		);			
		
		## Get Configuration Settings and display as a table list
		$config_settings = $this->_Parent->Configuration->get();

		$tableData = array();
		$count = 0;

		foreach($config_settings as $key => $groups)
		{
			foreach($groups as $name => $value) {
				$setting_group = $key;
				$setting_name = $name;
				$setting_value = $value;
				
				$tableData[] = Widget::TableData(Widget::Input('settings[' . $count . '][group]', $setting_group, 'text'));
				$tableData[] = Widget::TableData(Widget::Input('settings[' . $count . '][name]', $setting_name, 'text'));
				$tableData[] = Widget::TableData(Widget::Input('settings[' . $count . '][value]', $setting_value, 'text'));
			
				$count++;
			
				$aTableBody[] = Widget::TableRow($tableData, ($bEven ? 'even' : NULL));

				$bEven = !$bEven;
					
				unset($tableData);		
			}
		}

		$table = Widget::Table(Widget::TableHead($aTableHead), NULL, Widget::TableBody($aTableBody));
		$this->Form->appendChild($table);

		## Save Button
		$div = new XMLElement('div');
		$div->setAttribute('class', 'actions');
		$div->appendChild(Widget::Input('action[save]', 'Save Settings', 'submit', array('accesskey' => 's')));
		$this->Form->appendChild($div);

		## Notice Messages
		if(isset($this->_flag))
		{
			switch($this->_flag){
				
				case 'saved':
					$this->pageAlert('Configuration Settings updated successfully.', AdministrationPage::PAGE_ALERT_NOTICE);
					break;
					
				case 'error':
					$this->pageAlert('An error occurred.', AdministrationPage::PAGE_ALERT_NOTICE);
					break;
				
			}
		}
	}

/*	function __actionEdit(){			
		redirect(BASE_URL . '/edit/');
	}
*/
	
	function save() {
		$settings = $_POST['settings'];
		$count = count($settings) - 1;
		for ($i=0; $i<=$count; $i++) {
			$setting_group = $settings[$i]['group'];
			$setting_name = $settings[$i]['name'];
			$setting_value = $settings[$i]['value'];

			$this->_Parent->Configuration->set($setting_name, $setting_value, $setting_group);
		}
		$this->_Parent->saveConfig();
		return redirect(BASE_URL . '/edit/saved/');
	}

	function edit() {
		return redirect(BASE_URL . '/edit/');
	}
	
}
?>