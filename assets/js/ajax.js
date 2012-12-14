/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $('#userlogin').click(function(){
        var form_data={
            email:$('#loginEmail').val(),
            password:$('#loginPwd').val(),
            ajax:'1'
        };
        $.ajax({
            url: "/account/verify",
            type: 'POST',
            data: form_data,
            success: function(msg){
                alert(msg);
            }
        
        });
        return false;
    });
});