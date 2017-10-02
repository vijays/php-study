<!DOCTYPE <html>
<html>
<body>
    <?php
        //Simple class
        class c1 {
            function greet() {
                echo "Hello PHP <p>";
            }
        }
        $myObj = new c1 ;
        $myObj->greet() ;

        // Dependency Injection
        class logger {
            function log($msg){
                echo "log: $msg <p>";
            }
        }

        class userOperation {

            private $logger;

            public function __CONSTRUCT(logger $logger) {
                $this->logger = $logger;
            }

            public function createUser() {
                $this->logger->log("In create user.");
            }
        }

        $objLogger = new logger();

        $objUserOperation = new userOperation($objLogger);

        $objUserOperation->createUser();

        //Traits

        class vehicle {
            public function seat() {
                echo "Seated <br>";
            }
        }

        trait moveBicycle {
            public function pedal() {
                echo "Pedalling <br>";
            }
        }

        trait moveCar {
            public function accelerate() {
                echo "Accelerated <br>";
            }
        }

        trait brake {
            public function brake() {
                echo "Applied brakes <br>";
            }
        }

        class bicycle extends vehicle {
            use moveBicycle, brake;
        }

        class car extends vehicle {
            use moveCar, brake;
        }

        $objBicycle = new bicycle;
        $objCar = new car;

        $objBicycle->seat();
        $objBicycle->pedal();
        $objBicycle->brake(); 

        $objCar->seat();
        $objCar->accelerate();
        $objCar->brake();

        //Closures with Anonymous functions

        $someString = "<p> This is a test string <p>";

        $someVar = function() use ($someString) 
                    {
                        echo "$someString";
                    };
        
        $someVar();
?>
</body>    
</html>
