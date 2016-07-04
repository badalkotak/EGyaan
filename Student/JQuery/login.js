$(document).ready(function(){
	$("#login").click(function(){
		var user=$("#usr").val();
		var pass=$("#pwd").val();
		var br=$("#branch").val();

		$.ajax({
			url: "JQuery/check.php",
			type: "GET",
			data: "u="+user+"&p="+pass+"&br="+br,

			success:function(data)
			{
				if(data=="E")
				{
					console.log("E");
					$("#error").text("Please input all fields!");
				}
				else
				{
				if(data=="S")
				{
					window.location.href="Login_form.php?u="+user+"&p="+pass+"&br="+br;
				}
				else
				{
					$("#error").text("Invalid Username/Password!");
					$("#pwd").val("");
				}
				}
			},

			error:function()
			{
				console.log("Error Occured");
			}
		});

		return false;
	});
});