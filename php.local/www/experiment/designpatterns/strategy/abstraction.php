<?php
class Name {

	public $firstName;
	public $lastName;

	function __construct($firstName, $lastName){
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
}

abstract class NameDecorator {

	protected $name;

	function __construct($name){
		$this->name = $name;
	}

	abstract public function render();
}

class PlainTextNameDecorator extends NameDecorator {

	function render(){
		return sprintf('%s, %s', $this->name->lastName, $this->name->firstName);
	}
}

class TemplatedNameDecorator extends NameDecorator {

	protected $fullNameTemplate;

	function __construct($name, $fullNameTemplate){
		parent::__construct($name);
		$this->fullNameTemplate = $fullNameTemplate;
	}

	function render(){
		return sprintf($this->fullNameTemplate, $this->name->firstName, $this->name->lastName);
	}
}


$name = new Name('Zachary', 'Cameron Lynch');

$nameDecorator = new PlainTextNameDecorator($name);
$rendered = $nameDecorator->render();
echo "Simple rendering: $rendered<br>";

$template = '%s <strong>%s</strong>';
$nameDecorator = new TemplatedNameDecorator($name, $template);
$rendered = $nameDecorator->render();
echo "Rendering with template: $rendered<br>";

