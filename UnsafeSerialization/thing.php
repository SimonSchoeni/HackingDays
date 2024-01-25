<?php
class Test
{
    public $securityvariable = 'is this secure?';
    public $successVariable = 'SUCCESS!!!!!!!!!!!!!';
    public $min = 1;
    public $max = 10;
    public $failureVariable = 'FAILURE!';
    public $someOtherVariable = 'Truthähne können potentiell im Regen ertrinken.';
    public function PrintVariable()
    {
        echo "Object_PrintVariable_Message: The real question is: ". $this->securityvariable . "<br />";
        echo "We will execute this by doing a security check. <br>";
        $value = rand($this->min, $this->max);
        if($value >=10){
            echo $successVariable;
        }
        if($value == 7)
        {
            echo "<br>ABER: ".$this->someOtherVariable;
        }
    }
    
    public function __construct()
    {
        echo "<br>Object_Construct_Message: Constructed!<br>";
    }
    
    public function __destruct()
    {
        echo '<br>Object_Destruct_Message: Destructed! <br>';
        echo 'but before Im destroyed, let me execute a check on the security of this object. once again<br>';
        echo shell_exec($this->securityvariable);
    }
    
    public function __wakeup()
    {
        echo '<br>Object_Wakeup_Message: Woke up!<br />';
    }
}
?>
