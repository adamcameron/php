    <?php

    class MyClass {
        
        public function myMethod($name){
            $otherClass = new MyOtherClass($name);
            $otherClass->greeter();
        }
        
    }

    class MyOtherClass {

        private $name;
    
        public function __construct($name){
            $this->name = $name;
        }
    
        public function greeter(){
            echo "Hello {$this->name}";
        }
    }

    $myObj = new MyClass();
    $myObj->myMethod("user2650277");
