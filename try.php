<?php $RESULT = 11 + 011 + 0x11; echo "$RESULT";

function a ($string){

    return str_replace("_"," ", $string);
}


$string = 'Peter_fsaf_fsadfsa_f!';

echo filter_var($string, FILTER_CALLBACK, array('options'=> 'a'));

?><?php echo (checkdate(4,13,2021) ? 'Valid' : 'Invalid');?>
<?php  $abc = array('course ' => 'PHP-starter', 'topic' => 'programming');
echo $abc['topic'];
?>
