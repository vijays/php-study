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
                echo "log: $msg";
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
        

    ?>
</body>    
</html>
