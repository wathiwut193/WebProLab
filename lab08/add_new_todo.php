<?php
$link = mysql_connect('localhost','it5816019
3','Cc2191996@');
mysql_query("SET NAMES UTF8");
mysql_select_db('it58160193',$link);

//insert new todo
if($_POST['topic'] != ""){
    $start = date('Y-m-d H:i:s');
$topic = addslashes($_POST['topic']);
$sql = "INSERT INTO todo (start, topic, status) VALUES ('$start', '$topic', 0);";
mysql_query($sql);


}else if($_POST['id'] != ""){
     $id = addslashes($_POST['id']); $i=0;
    $sql = "SELECT * FROM todo ORDER BY status, id desc";
    $result = mysql_query($sql,$link);
    while($obj = mysql_fetch_object($result)){ 
        if($obj->id == $id){ 
            if($obj->status == 1){
                $i++;
            } 
        } 
        }
    if($i == 0){
        $finish = date('Y-m-d H:i:s');
        $sql = "UPDATE todo SET status=1, finish='$finish' WHERE id=".$id."";
    }else{
        $sql = "UPDATE todo SET status=0, finish=NULL WHERE id=".$id."";
    }mysql_query($sql);

}



// get data back
$sql = "SELECT * FROM todo ORDER BY status, id desc";
$result = mysql_query($sql, $link);
$html1 = ""; $html2 = ""; $html3 = "<script>$(\"input\").change(function() {";
while($obj = mysql_fetch_object($result)) {
    if($obj->status == 0){
        $html1 .= '<br> <input type="checkbox" class="checkbox" id="'.$obj->id.'" name="'.$obj->id.'" value="'.$obj->topic.'">'.$obj->topic." ";
        $html1 .= "<font color='#009900' size='1'>[".$obj->start."]</font>";
    }else{
        $html2 .= '<br> <input type="checkbox" class="checkbox" id="'.$obj->id.'" name="'.$obj->id.'" value="'.$obj->topic.'"><s>'.$obj->topic." ";
        $html2 .= "<font color='#009900' size='1'>[".$obj->finish."]</font></s>";
    }
    $html3 .= "if($('#".$obj->id."').prop(\"checked\") == true){\$.ajax({url: \"add_new_todo.php\", type: \"POST\", data: \"id=\" + ".$obj->id.", success: function(data) { $(\"#disp\").html(data); }, error: function(data) { $(\"#disp\").html(\"<h3>Error!</h3>\"); }});}";
}
echo $html1.$html2.$html3."}).change();</script>";
?>