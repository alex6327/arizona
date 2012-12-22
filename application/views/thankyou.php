<div id ="homecontent">
<?php foreach ($names as $name) {
     echo $name['cname'];
     echo '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
     echo form_open('thankyou/modify');
     echo form_hidden('id',$name['Category ID']);
     echo form_hidden('table',$table);
     echo "<input name='name' type='text' id='name'  size='30' />";
     echo form_submit('submit', 'Submit');
     echo form_close();
     echo '<br/>';
     echo '<br/>';
     
    
}?>
</div>