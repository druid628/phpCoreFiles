<?PHP
abstract class BaseClass628 {

  public function get($fieldName)
  {
    if(!property_exists($this, $fieldName))
    {
          trigger_error("Variable ($fieldName) Not Found", E_USER_ERROR);
    }

    return $this->$fieldName;
  }

  public function set($fieldName, $value)
  {
    if(!property_exists($this, $fieldName))
    {
          trigger_error("Variable ($fieldName) Not Found", E_USER_ERROR);
    }

    $this->$fieldName = $value;
    return true;
  }

  public function lcfirst($string)
  {
      $string{0} = strtolower($string{0});
      return $string;
  }

  public function __call($method, $arguments)
  {
    try {
        $verb = substr($method, 0, 3);
        if(in_array($verb, array('set','get')))
        {
          $name = substr($method, 3);
        }

        if(method_exists($this, $verb))
        {
          if(property_exists($this, $name))
          {
              return call_user_func_array(array($this,$verb), array_merge(array($name), $arguments));
          }
          elseif(property_exists($this, lcfirst($name)))
          {
              return call_user_func_array(array($this,$verb), array_merge(array(lcfirst($name)), $arguments));
          }
          else
          {
              throw new Exception("Variable  ($name)  Not Found");
          }
        }
        else
        {
          throw new Exception("Function ($verb) Not Defined");
        }

    } catch(Exception $e) {
        printf("You done yucked up!");
        var_dump($e);
    }
  }
}
