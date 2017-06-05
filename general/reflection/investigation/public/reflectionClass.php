<?php

require __DIR__ . '\..\vendor\autoload.php';

$reflectionOfMyClass = new \ReflectionClass('\me\adamcameron\reflection\investigation\MyClass');

printWithLabel($reflectionOfMyClass, "ReflectionClass");

printWithLabel($reflectionOfMyClass->getConstants(), "getConstants()");

printWithLabel($reflectionOfMyClass->getConstructor(), "getConstructor()");

printWithLabel($reflectionOfMyClass->getDefaultProperties(), "getDefaultProperties()");

printWithLabel($reflectionOfMyClass->getDocComment(), "getDocComment()");

$lines = [
	'start line' => $reflectionOfMyClass->getStartLine(),
	'end line' => $reflectionOfMyClass->getEndLine()
];
printWithLabel($lines, "lines");

printWithLabel($reflectionOfMyClass->getFileName(), "getFileName()");

printWithLabel($reflectionOfMyClass->getInterfaceNames(), "getInterfaceNames()");

printWithLabel($reflectionOfMyClass->getInterfaces(), "getInterfaces()");

printWithLabel($reflectionOfMyClass->getMethods(), "getMethods()");

printWithLabel($reflectionOfMyClass->getModifiers(), "getModifiers()");

printWithLabel($reflectionOfMyClass->getName(), "getName()");

printWithLabel($reflectionOfMyClass->getNamespaceName(), "getNamespaceName()");

printWithLabel($reflectionOfMyClass->getParentClass(), "getParentClass()");

printWithLabel($reflectionOfMyClass->getProperties(), "getProperties()");

printWithLabel($reflectionOfMyClass->getShortName(), "getShortName()");

printWithLabel($reflectionOfMyClass->getStaticProperties(), "getStaticProperties()");

printWithLabel($reflectionOfMyClass->getTraitAliases(), "getTraitAliases()");

printWithLabel($reflectionOfMyClass->getTraitNames(), "getTraitNames()");

printWithLabel($reflectionOfMyClass->getTraits(), "getTraits()");


function printWithLabel($object, $label=""){
	echo PHP_EOL . $label . PHP_EOL;
	print_r($object);
	echo PHP_EOL . PHP_EOL;
}
