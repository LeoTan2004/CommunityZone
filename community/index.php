<?php
class Test{
    function getName(){
        return "Leo\n";
    }
}
$ss = new Test();
$arr = array(2 => $ss);
echo $ss->getName();
unset($arr[2]);
echo $ss->getName();
?>