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
		return $this->renderingHandler->render($this->name->firstName, $this->name->lastName);
	}
}


class DefaultRenderingHandler {

	function render($firstName, $lastName){
		return "$lastName, $firstName";
	}
}

class TemplatedRenderingHandler {

	private $template;

	function __construct($template){
		$this->template = $template;
	}

	function render($firstName, $lastName){
		return sprintf($this->template, $firstName, $lastName);
	}
}

$name = new Name('Zachary', 'Cameron Lynch');

$nameDecorator = new NameDecorator($name, new DefaultRenderingHandler());
$rendered = $nameDecorator->render();
echo "Simple rendering: $rendered<br>";


$template = '%s <strong>%s</strong>';
$nameDecorator = new NameDecorator($name, new TemplatedRenderingHandler($template));
$rendered = $nameDecorator->render();
echo "Rendering with template: $rendered<br>";

