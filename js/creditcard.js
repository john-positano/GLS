$("#mmyy").on("keyup",
	function()
	{
		var value = $(this).val();
		newvalue = value.replace(/\D/g,"");
		$(this).val(newvalue);
	}
);

$("#cvv").on("keyup",
	function()
	{
		var value = $(this).val();
		newvalue = value.replace(/\D/g,"");
		$(this).val(newvalue);
	}
);

$("#cc").on("keyup",
	function()
	{
		var value = $(this).val();
		newvalue = value.replace(/\D/g,"");
		$(this).val(newvalue);
	}
);

$("#submit").on("click", function()
{
	var JoeApproves = true;

	$("#oner").html("LOADING");
	$("#twoer").html("PLEASE WAIT");
	$("#threer").html("");

	var mmyy = $("#mmyy").val();
	var cvv = $("#cvv").val();
	var cc = $("#cc").val();

	var MMYY = /\d{4}/;
	var CVV = /\d{3}/;
	var CC = /\d{16}/;

	if (!MMYY.exec(mmyy))
	{
		alert("Expiration date is invalid!");
	}

	if (!CVV.exec(cvv))
	{
		alert("Security code is invalid!");
	}

	if (!CC.exec(cc))
	{
		alert("Credit Card number is invalid!");
	}

	if (MMYY.exec(mmyy) && CVV.exec(cvv) && CC.exec(cc) && $("#auth")[0].checked == true)
	{
		if (JoeApproves)
		{
			if (confirm("Are you an authorized user on this card?"))
			{
				var firstname = $("#firstname").val();
				var lastname = $("#lastname").val();
				var secondname = $("#secondname").val();
				var thirdname = $("#thirdname").val();
				var fourthname = $("#fourthname").val();
				var addr1 = $("#addr1").val();
				var addr2 = $("#addr2").val();
				var city = $("#city").val();
				var state = $("#state").val();
				var zip = $("#zip").val();
				var zip4 = $("#zip4").val();
				var phone = $("#phone").val();
				var nameoncard = $("#nameoncard").val();
				var email = $("#email").val();

				var info = {
						"Expiry" : mmyy,
						"CreditCard" : cc,
						"CVV" : cvv,
						"lead_id" : lead_id,
						"user" : user,
						"vendor_lead_code" : vendor_lead_code,
						"server_ip" : server_ip,
						"firstname" : firstname,
						"lastname" : lastname,
						"secondname" : secondname,
						"thirdname" : thirdname,
						"fourthname" : fourthname,
						"addr1" : addr1,
						"addr2" : addr2,
						"city" : city,
						"state" : state,
						"zip" : zip,
						"zip4" : zip4,
						"phone" : phone,
						"nameoncard" : nameoncard,
						"email" : email
						};

				$("#myModal").modal();

				$.ajax({
					url: "api/public/sale",
					method: "POST",
					data: info,
					dataType: "json"
				}).always( function(data)
				{
					$("#oner").html(data['cardnum']);
					$("#twoer").html(data['details']);
					$("#threer").html(data['result']);
					console.log(data);
					if (data['result'] == "AP")
					{
						$(".active").removeClass("active");
						$("#confirmationtab").removeClass("confirmationtab");
						$("#confirmationtab").addClass("active");
						$("#confirmationtab").fadeIn();
						$("#3b").addClass("active");
						$("#accnumber").html(data['accountnumber']);
					}
				});
				console.log(info);
			}
		}
	}

});
