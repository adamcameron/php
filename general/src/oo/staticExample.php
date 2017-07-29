    <?php

    class MyClass {
        
        public function myMethod($name){
            MyOtherClass::greeter($name);
        }
        
    }

    class MyOtherClass {

        public static function greeter($name){
            echo "Hello $name";
        }
    }

    $myObj = new MyClass();
    $myObj->myMethod("user2650277");
