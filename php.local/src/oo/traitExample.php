    <?php

    class MyClass {
        use MyTrait;
        
    }


    trait MyTrait {

        public function greeter($name){
            echo "Hello $name";
        }
    }


    $myObj = new MyClass();
    $myObj->greeter("user2650277"); // Hello user2650277
