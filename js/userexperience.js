$('[data-toggle="popover"]').popover({ container: "body"});
$(".btn").on("mouseover", function()
{
	$(this).popover("show");
});
$(".btn").on("mouseout", function()
{
	$(this).popover("hide");
});

function opener()
{
	$("#topportion").animate({ "height" : "70vh" });
	$("#bottomportion").slideDown();
	$("#accordion").html("Hide Info");
	$("#accordion").removeClass("btn-success");
	$("#accordion").addClass("btn-warning");
	$("#accordion").off();
	$("#accordion").on("click", function()
	{
		closer();
	});
}

function closer()
{
	$("#topportion").animate({ "height" : "100vh" });
	$("#bottomportion").slideUp();
	$("#accordion").html("Enter Info");
	$("#accordion").removeClass("btn-warning");
	$("#accordion").addClass("btn-success");
	$("#accordion").off();
	$("#accordion").on("click", function()
	{
		opener();
	});
}

$("#accordion").on("click", function()
{
	opener();
});

$("#lastname").on("keyup", function()
{
	var ln = $(this).val();
	$(".ln").html(ln);
});

$("#auth").on("change", function(event)
{
	if ($("#auth")[0].checked == true)
	{
		$("#sub").slideDown();
	}
	if ($("#auth")[0].checked == false)
	{
		$("#sub").slideUp();
	}	
});

var sequence = 0;
var command = "START";

function recording(comm, a)
{
	sequence++;
	$.ajax({
		url: "api/public/record",
		data: {"command" : command, "user" : user, "lead_id" : lead_id, "sequence" : sequence},
		dataType: "json"
	}).always(function(data) {
		switch(comm)
		{
			case "STOP":
				$(a).removeClass("btn-success");
				$(a).addClass("btn-danger");
				$(a).html("STOP RECORDING");
				command = "START";
				console.log("started");
				var s = $("#startstopbutton").detach();
				$("#place1").append(s);
				break;
			case "START":
				$(a).removeClass("btn-danger");
				$(a).addClass("btn-success");
				$(a).html("START RECORDING");
				command = "STOP";
				console.log("stopped");
				var s = $("#startstopbutton").detach();
				$("#place2").append(s);
				break;
			default:
				console.log(command);				
		}
		console.log(data);
	});		
}

$("#startstopbutton").on("click", function() { recording(command, this); });
