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
	private $fullNameTemplate;

	function __construct($name, $fullNameTemplate){
		$this->name = $name;
		$this->fullNameTemplate = $fullNameTemplate;
	}

	function renderFullNameAsPlainText(){
		return sprintf('%s, %s', $this->name->lastName, $this->name->firstName);
	}

	function renderFullNameWithHtmlTemplate(){
		return sprintf($this->fullNameTemplate, $this->name->firstName, $this->name->lastName);
	}
}


$name = new Name('Zachary', 'Cameron Lynch');
$template = '%s <strong>%s</strong>';

$nameDecorator = new NameDecorator($name, $template);

$rendered = $nameDecorator->renderFullNameAsPlainText();
echo "Simple rendering: $rendered<br>";

$rendered = $nameDecorator->renderFullNameWithHtmlTemplate();
echo "Rendering with template: $rendered<br>";

