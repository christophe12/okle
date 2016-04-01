$(function(){

//displays the delete confirmation modal, and sends back to php

var deleteModal = $("#deleteModal");
var body = $("#delete_modal_body");
var delete_url_holder = $("#deleteUrl");
 $('.deleteBtn').each(function(){
    $(this).on("click", function(){
       if (($(this).attr('title')) == "Delete Page") {
       	   console.log("clicked");
       	   var pagename = $(this).attr('page');
           var username = $(this).attr('user');
           var url = "/admin/" + username + "/page/" + pagename +"/delete";
       	  body.html("<p>Are you sure you want to delete <i class='pageName'>" + pagename + "</i> page ? <br /><strong>Notice:</strong> The page's product will be delete as well!</p>");
          delete_url_holder.attr('href', url);
          deleteModal.modal('show');
       }
    });
 });
});