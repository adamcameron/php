<?php
class Name {

	public $firstName;
	public $lastName;

	function __construct($firstName, $lastName){
		$this->firstName = $firstName;
		$this->lastName = $lastName;
	}
}

class NameDecorator {

	private $renderingHandler;
	private $name;

	function __construct($name, $renderingHandler){
		$this->name = $name;
		$this->renderingHandler = $renderingHandler;
	}

	function render(){
		return ($this->renderingHandler)($this->name->firstName, $this->name->lastName);
	}
}


$renderAsPlainText = function ($firstName, $lastName) {
	return "$lastName, $firstName";
};

$template = '%s <strong>%s</strong>';

$renderWithTemplate	= function ($firstName, $lastName) use ($template) {
	return sprintf($template, $firstName, $lastName);
};


$name = new Name('Zachary', 'Cameron Lynch');

$nameDecorator = new NameDecorator($name, $renderAsPlainText);
$rendered = $nameDecorator->render();
echo "Simple rendering: $rendered<br>";


$nameDecorator = new NameDecorator($name, $renderWithTemplate);
$rendered = $nameDecorator->render();
echo "Rendering with template: $rendered<br>";

