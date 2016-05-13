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

	private $name;

	function __construct($name){
		$this->name = $name;
	}

	function renderFullNameAsPlainText(){
		return sprintf('%s, %s', $this->name->lastName, $this->name->firstName);
	}

	function renderFullNameWithHtmlTemplate($template){
		return sprintf($template, $this->name->firstName, $this->name->lastName);
	}
}


$name = new Name('Zachary', 'Cameron Lynch');
$template = '%s <strong>%s</strong>';

$nameDecorator = new NameDecorator($name);

$rendered = $nameDecorator->renderFullNameAsPlainText();
echo "Simple rendering: $rendered<br>";

$rendered = $nameDecorator->renderFullNameWithHtmlTemplate($template);
echo "Rendering with template: $rendered<br>";

