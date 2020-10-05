$(document).ready(function()
{  
	
	$("button").on('click',function(event)
	{ //alert("button");
		if($(this).text()==="Add Comment")
		{//alert("adding comment");
			$('<input type="text" class="form-control m-3" name="newComment"/>').insertBefore($(this));
			$(this).text("Save Comment");
			//$(this).type("submit");
			//$(this).parent("form").action("addcomment.php");
		}
		else if($(this).text()==="Edit Information")
		{

			let Cardparent=$(this).parent();
			Cardparent.children().remove();
			Cardparent.append("<ul class='list-group'></ul>");
			let eidtttts=Cardparent.children("ul");
			
			eidtttts.append("<input type='text' placeholder='Name' name='newSurname'/><br>");
			eidtttts.append("<input type='text' placeholder='Surname' name='newName'/><br>");
			eidtttts.append("<input type='email' placeholder='Email' name='newEmail'/><br>");
			eidtttts.append("<input type='date' placeholder='Birthday' name='newBirth'/><br>");
			eidtttts.append("<input type='password' placeholder='Password' name='newPass'/><br>");
			
			Cardparent.append("<button class='btn btn-dark  ml-3 '>Save Edit Information</button><br>");
			//$(this).type("submit");
			//$(this).parent("form").action("addcomment.php");
		}
		else if($(this).text()==="Save Edit Information")
		{

			let Cardparent=$(this).parent();
			Cardparent.children().remove();
			Cardparent.append("<ul class='list-group'></ul>");
			let eidtttts=Cardparent.children("ul");
			
			eidtttts.append("<input type='text' placeholder='Name' name='newSurname'/><br>");
			eidtttts.append("<input type='text' placeholder='Surname' name='newName'/><br>");
			eidtttts.append("<input type='email' placeholder='Email' name='newEmail'/><br>");
			eidtttts.append("<input type='date' placeholder='Birthday' name='newBirth'/><br>");
			eidtttts.append("<input type='password' placeholder='Password' name='newPass'/><br>");
			
			Cardparent.append("<button class='btn btn-dark  ml-3 '>Save Edit Information</button><br>");
			//$(this).type("submit");
			//$(this).parent("form").action("addcomment.php");
		}
		else if($(this).text()==="Save Comment")
		{
		let Cardparent=$(this).parent();
			let group=Cardparent.siblings("div[name='infor']");
			//$('<input type="text" class="form-control m-3" name="newComment"></input>').remove();
			var Puser=group.children("input[name*='user']").val();
			var Pimage=group.children(this).siblings("input[name*='pimage']").val();
			var PnewCommnet=$("input[name*='newComment']").val();
			var Pemail=group.children("input[name*='email']").val();
			var Ppass=group.children("input[name*='pass']").val();
			$("input[name*='newComment']").remove();

			 //alert(Puser);
			 //Puser='"'+Puser+'"';
			//alert(Pimage);
			// let req =new XMLHttpRequest();
			// req.open("GET","addcoment.php?user="+Puser+"&image="+Pimage+"&newCommnet="+PnewCommnet);
			// req.send();
			//location.replace("addcoment.php")
//alert('user='+Puser+'&image='+Pimage+'&newCommnet='+PnewCommnet);
if(PnewCommnet!='')
			 {$.ajax({
						type: 'POST',
						url: 'addcoment.php',
						data:'user='+Puser+'&pimage='+Pimage+'&newComment='+PnewCommnet

                   ,success:function()
                   {
                  // 	alert('Comment added');
                   	location.replace('profilepage.php?loginPass='+Ppass+'&loginEmail='+Pemail);
						$('#profilereload').submit()
                   }});}
			//   $.ajax({
			// 			type: 'POST',
			// 			url: 'login.php',
			// 			data:'loginPass='+Ppass+'&loginEmail='+Pemail

   //                 });
			 $(this).text("Add Comment");
			// .done(data => {
							// if (`${data}`!=="Valid")
							// {alert("comment added");
								//$( 	'<div class="alert alert-warning mt-3" role="alert">'+``+'</div>').insertAfter($(this));
								
							// }        

		// });
	}
	else if($(this).text()==="Edit Post")
	{
		var Cardbody=$(this).parent();
		 $(this).text("Save Edit");
		let PostContent= Cardbody.children("ul[id=editat]");
		let curdes=PostContent.children("li[name=des]").text();
		let curhas=PostContent.children("li[name=hashtaggs]").text();
		// alert(curhas);
		PostContent.children("li").remove();
		if(curdes)
		PostContent.append("<input type='text' value='"+curdes+"' name='newDes'/><br>");
		else
			PostContent.append("<input type='text' placeholder='Description' name='newDes'/><br>");
		if(curdes)
		PostContent.append("<input type='text' value='"+curhas+"' name='newhas'/>");
		else
		PostContent.append("<input type='text' placeholder='hashtags' name='newhas'/>");
		PostContent.append("<br>");	
	}
	else if($(this).text()==="Save Edit")
	{//alert("saving");
		let Cardparent=$(this).parent();
			let group=Cardparent.siblings("div[name='infor']");
			//$('<input type="text" class="form-control m-3" name="newComment"></input>').remove();
			var Puser=group.children("input[name*='user']").val();
			var Pimage=group.children(this).siblings("input[name*='pimage']").val();
			var PnewCommnet=$("input[name*='newComment']").val();
			var Pemail=group.children("input[name*='email']").val();
			var Ppass=group.children("input[name*='pass']").val();
		var Cardbody=$(this).parent();
		// $(this).text("Save Edit");
		let PostContent= Cardbody.children("ul[id=editat]");
		var Pdes=PostContent.children("input[name*='newDes']").val();
		var Phas=PostContent.children("input[name*='newhas']").val();
		// PostContent.children("li").remove();
		 $.ajax({
						type: 'POST',
						url: 'editPost.php',
						data:'descript='+Pdes+'&hashtag='+Phas+'&image='+Pimage

                   ,success:function()
                   {
                  	//alert('edit added');
                   	location.replace('profilepage.php?loginPass='+Ppass+'&loginEmail='+Pemail);
						$('#profilereload').submit()
                   }});
	
	}
	else if($(this).text()==="Delete Post")
	{
		//alert("deleting");
		let Cardparent=$(this).parent();
			let group=Cardparent.siblings("div[name='infor']");
			//$('<input type="text" class="form-control m-3" name="newComment"></input>').remove();
			 var Puser=group.children("input[name*='user']").val();
			var Pimage=group.children(this).siblings("input[name*='pimage']").val();
			// var PnewCommnet=$("input[name*='newComment']").val();
			var Pemail=group.children("input[name*='email']").val();
			var Ppass=group.children("input[name*='pass']").val();
		// var Cardbody=$(this).parent();
		// // $(this).text("Save Edit");
		// let PostContent= Cardbody.children("ul[id=editat]");
		// var Pdes=PostContent.children("input[name*='newDes']").val();
		// var Phas=PostContent.children("input[name*='newhas']").val();
		// PostContent.children("li").remove();
		 $.ajax({
						type: 'POST',
						url: 'deletePost.php',
						data:'image='+Pimage

                   ,success:function(res)
                   {
                  //	alert("done");
                   	location.replace('profilepage.php?loginPass='+Ppass+'&loginEmail='+Pemail);
						$('#profilereload').submit()
                   }});
	
	}
	else if($(this).text()==="View Post")
	{
		//alert("deleting");
		let Cardparent=$(this).parent();
			let group=Cardparent.siblings("div[name='infor']");
			//$('<input type="text" class="form-control m-3" name="newComment"></input>').remove();
			var Puser=group.children("input[name*='user']").val();
			var Pimage=group.children(this).siblings("input[name*='pimage']").val();
			// var PnewCommnet=$("input[name*='newComment']").val();
			var Pemail=group.children("input[name*='email']").val();
			var Ppass=group.children("input[name*='pass']").val();
		// var Cardbody=$(this).parent();
		// // $(this).text("Save Edit");
		// let PostContent= Cardbody.children("ul[id=editat]");
		// var Pdes=PostContent.children("input[name*='newDes']").val();
		// var Phas=PostContent.children("input[name*='newhas']").val();
		// PostContent.children("li").remove();
		location.replace('postpage.php?image='+Pimage+'&loginPass='+Ppass+'&loginEmail='+Pemail+'&user='+Puser);
		 // $.ajax({
			// 			type: 'POST',
			// 			url: 'postpage.php',
			// 			data:'image='+Pimage+'loginPass='+Ppass+'&loginEmail='+Pemail

   //                 ,success:function(res)
   //                 {
   //                //	alert("done");
                   	
			// 			$('#profile').submit()
   //                 }});
	
	}
});
});




