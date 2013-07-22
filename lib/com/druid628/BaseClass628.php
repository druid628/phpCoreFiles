<?PHP

namespace com\druid628;

abstract class BaseClass628 {

        /**
         * 
         * hooray for magic!!
         *
         * @param string $method
         * @param mixed $arguments
         * @return mixed 
         */
        public function __call($method, $arguments)
        {
                try
                {
                        $verb = substr($method, 0, 3);
                        if (in_array($verb, array('set', 'get')))
                        {
                                $name = substr($method, 3);
                        }

                        if (method_exists($this, $verb))
                        {
                                if (property_exists($this, $name))
                                {
                                        return call_user_func_array(array($this, $verb), array_merge(array($name), $arguments));
                                } elseif (property_exists($this, lcfirst($name)))
                                {
                                        return call_user_func_array(array($this, $verb), array_merge(array(lcfirst($name)), $arguments));
                                } else
                                {
                                        throw new Exception("Variable  ($name)  Not Found");
                                }
                        } else
                        {
                                throw new Exception("Function ($verb) Not Defined");
                        }
                } catch (Exception $e)
                {
                        printf("You done yucked up!");
                        var_dump($e);
                }
        }

        /**
         * 
         * standard getter
         *
         * @param string $fieldName
         * @return mixed 
         */
        public function get($fieldName)
        {
                if (!property_exists($this, $fieldName))
                {
                        trigger_error("Variable ($fieldName) Not Found", E_USER_ERROR);
                }

                return $this->$fieldName;
        }

        /**
         * standard setter
         *
         * @param string $fieldName
         * @param mixed $value
         * @return boolean 
         */
        public function set($fieldName, $value)
        {
                if (!property_exists($this, $fieldName))
                {
                        trigger_error("Variable ($fieldName) Not Found", E_USER_ERROR);
                }

                $this->$fieldName = $value;
                return true;
        }

        /**
         *
         * cast transfers a standard PHP object to a class of your choice
         * 
         * 
         * @param stdClass $obj
         * @param <Type> $class
         * @return <TypeOf> $class 
         * @see http://freebsd.co.il/cast/
         */
        public function cast($obj, $class)
        {
                $reflectionClass = new ReflectionClass($class);
                if (!$reflectionClass->IsInstantiable())
                {
                        throw new Exception($class . " is not instantiable!");
                }

                if ($obj instanceof $class)
                {
                        return $obj; // nothing to do.
                }

                // lets instantiate the new object
                $tmpObject = $reflectionClass->newInstance();

                $properties = Array();
                foreach ($reflectionClass->getProperties() as $property)
                {
                        $properties[$property->getName()] = $property;
                }

                // we'll take all the properties from the fathers as well
                // overwriting the old properties from the son as well if needed.
                $parentClass = $reflectionClass; // loop init
                while ($parentClass = $parentClass->getParentClass())
                {
                        foreach ($parentClass->getProperties() as $property)
                        {
                                $properties[$property->getName()] = $property;
                        }
                }

                // now lets see what we have set in $obj and transfer that to the new object
                $vars = get_object_vars($obj);
                foreach ($vars as $varName => $varValue)
                {
                        if (array_key_exists($varName, $properties))
                        {
                                $prop = $properties[$varName];
                                if (!$prop->isPublic())
                                {
                                        $prop->setAccessible(true);
                                }
                                $prop->setValue($tmpObject, $varValue);
                        }
                }

                return $tmpObject;
        }


        /**
         * sum values in array by key
         *
         * @param array $arr
         * @param string [optional]$index
         * @return int result
         * 
         * source: http://www.php.net/manual/en/function.array-sum.php#85548
         */
        public function array_sum_key( $arr, $index = null ){
            if(!is_array( $arr ) || sizeof( $arr ) < 1){
                return 0;
            }
            $ret = 0;
            foreach( $arr as $id => $data ){
                if( isset( $index )  ){
                    $ret += (isset( $data[$index] )) ? $data[$index] : 0;
                }else{
                    $ret += $data;
                }
            }
            return $ret;
        }

        /**
         *
         * Takes an array test to see if it is multi-dimensional.
         * Great for use before using array_diff 
         * example:
         * $x = arary(1, array(2,3,4), 5, 6);
         * $y = arary(1, array(7,8), 5, 6);
         * $z = arary(1, 'Array', 5, 6);
         * 
         * empty(array_diff($x, $y)); // returns true
         * empty(array_diff($y, $z)); // returns true
         * 
         * array_diff() does a toString() on every entity in the array so multi-dim arrays return the string "Array"
         * thanks to @epochblue for that find
         * 
         * @param array $array
         * @return boolean 
         */
        public function is_array_multi($array)
        {
                return (bool) (count($array) != count($array, COUNT_RECURSIVE));
        }

        /**
         * get the performance data (Peak Memory Usage) for a given script or
         * class
         * 
         * @return string 
         */
        public function getPerformance()
        {
                $mem_usage = memory_get_peak_usage();
                if ($mem_usage < 1024)
                {
                        $whoa = $mem_usage . " bytes";
                } elseif ($mem_usage < 1048576)
                {
                        $whoa =round($mem_usage / 1024, 2) . " kilobytes";
                } else
                {
                        $whoa = round($mem_usage / 1048576, 2) . " megabytes";
                }

                return $whoa;
        }

        /**
         *
         * tests to see if class is being executed from command line
         * 
         * @return boolean
         */
        public function isCli() 
        {
            return php_sapi_name()==="cli";
        }


        /**
         * Generates a humorous error message formed similar to the old
         * DOS style errors
         *
         * @param String $errorType  - self explanitory e.g. Syntax
         * @param String $message - explination error
         * @param String $correction - what you should have put
         *
         * @return string
         */
        public function formatErrorDOS($errorType, $message, $correction)
        {
            $errorType = strtoupper($errorType);
                return <<<EOF
################
##
## $errorType ERROR: $message
##
################
\n\n\t\t$errorType: $correction \n\n
Bad command or file name.\nC:\>_\n
EOF;

        }
}
