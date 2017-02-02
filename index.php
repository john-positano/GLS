<?php

$lead_id = $_GET['lead_id'];
$user = $_GET['user'];
$vendor_lead_code = $_GET['vendor_lead_code'];
$server_ip = $_GET['server_ip'];
$agentname = $_GET['AgentName'];
if (isset($_GET['phone_number']) && is_numeric($_GET['phone_number']))
{ 
	$inboundphonenumber = $_GET['phone_number']; 
}

?>

<html>

	<head>
		<title>Roadside Assitance Inbound Script</title>

		<script src="lib/jquery-3.3.1/jquery-3.1.1.min.js?v=1"></script>
		<script src="lib/bootstrap-3.3.7/dist/js/bootstrap.min.js?v=1"></script>

		<link rel="stylesheet" href="lib/bootstrap-3.3.7/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/styles.css"
	</head>

	<body>

		<div class="container-fluid" id="everything">
			<div class="row" id="topportion">

				<div class="col-xs-2" id="sidebar">
					<table cellspacing="0">
						<thead>
							<th>Rebuttals</th>
						</thead>
						<tbody>
							<tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Customer does not have Credit Card:"
							data-content="That&#39;s not a problem at all; We can use your bank debit card. The first thing I need to do is verify the expiration date when you look at the front of the card. It should say &#39;GOOD THRU&#39; or &#39;VALID TIL&#39;"
							>No Card</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Card fails upon Pre-Authorization:"
							data-content="Unfortunately, my system is showing me that we cannot get you started with this card. What is the expiration date on your other card?"
							>Card Fails</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Customer is uncomfortable using their card over the phone:"
							data-content="I can appreciate your being uncomfortable using your card over the phone, but the main reason that we do bill through the card is simply because you are completely protected by your card company. You see (customer name), under a FEDERAL LAW called the CONSUMER FRAUD PROTECTION ACT, it states that if we or any other company billed something to your card without your approval or if we didn't send you exactly what we promised, your card company must protect you by allowing you to dispute the charge. Now, if you did that, it would not only damage our excellent reputation as a company, but it could also cause us to lose our privilege to bill our customers through major Credit Cards. So, honestly, to charge something to your account without your approval would be extremely counterproductive. Remember, your only obligation is $1.95. So, what I need to do now is for you to verify the expiration date on the front of your card."
							>Card over Phone</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Encryption:"
							data-content="We do enter all of your information into an encrypted system for your protection. Let me give you an example. You know when you go to an ATM machine and put in your ATM card? Instead of your pin number apearing on the screen, you just get a row of X&#39;s. That's the same system that we have here. So, instead of your card number actually appearing on our screen, we just get a long row of X&#39;s. This way, no one has access to your account number.Now, I do need to validate the exact month and year of the expiration of the credit card..."
							>Encryption</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Customer wants to use Amex or Discover:"
							data-content="I&#39;m sorry we only accept Visa and Mastercard. We can also use your bank card. The first thing I need to do is verify the expiration date."
							>Amex/Discover</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Does 24/7 Road Assist work if I leave the state?"
							data-content="24/7 Road Assist does provide you with assistance all across the country even if you are traveling. We even include travel and automotive discounts that you can use nationwide at no additional charge. OK?"
							>Leaving State</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Customer Objects to Auto Program:"
							data-content="This program is designed to save you money.  We provide you with full access to the program for 30 days. This way, you can take advantage of the savings and make an informed decision on whether or not the program will benefit you. Your only obligation is the $1.95. So, the only way you would pay the monthly fee is if you like the program and decide to stay a member after the trial, OK?"
							>Not Interested</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="Not Interested because I will forget to call and cancel"
							data-content="I understand your concern. That&#39;s why we give you the toll free numbers today as well as in your welcome package. Keep in mind; you don’t have to wait the entire 30 days. Once you get the package, take a look at the materials and if it doesn’t work for you, simply pick up the phone. It&#39;s that easy. OK?"
							>Will Forget Cancel</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="When does the trial start?"
							data-content="Remember, it&#39;s only a 30 day trial, which starts tomorrow. And you’re only billed the $1.95 today. Everything is processed, and sent out tomorrow so you have a full 30 days to try it out. That way you have nothing to lose, right?"
							>Trial Starts When</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="I don't drive/I don't have a car:"
							data-content="That&#39;s OK!  Our program also allows you to protect up to 3 additional drivers in your family. Not to mention the discounts on hotels, theme parks, and car rentals, so you’re still able to take advantage of all our great services, Ok? "
							>Don't Drive/No Car</button> </td></tr><tr><td>
							<button id="" 
							class="btn btn-secondary full"
							data-toggle="popover"
							title="I am already enrolled in a similar program:"
							data-content="We are not asking you to cancel your existing service, but instead give you a 30 day trial on our program to compare both and see what you feel is best.  If anytime during the 30 days you decide it's not for you, or that you have no use for it, simply call the toll free number provided to cancel anytime."
							>Enrolled in Similar</button>
							</td></tr>
						</tbody>
					</table>
				</div>

				<div class="col-xs-10" id="mainscreen">
					<ul  class="nav nav-tabs">
						<li class="active" id="scripttab">
        					<a  href="#1b" data-toggle="tab">Script</a>
						</li>
						<li id="qatab">
							<a href="#2b" data-toggle="tab">Q & A</a>
						</li>
						<li id="confirmationtab" class="confirmationtab">
							<a href="#3b" data-toggle="tab">Confirmation</a>
						</li>
						</ul>

					<div class="tab-content clearfix">
			  			<div class="tab-pane active" id="1b">
         					<h1>
							Roadside Assistance Inbound Script
							</h1>
							<br>
							<br>
							<h3>
							Presentation
							</h3>
							<p>
							Thank You for answering the questions. Based on your answers, your call has been directed to me. My name is <?php if (isset($agentname)) { echo $agentname; } else { echo "___________"; } ?> on behalf of <b>Road Assist 24/7</b>. May I ask your name?
							</p>
							<table class="holder">
								<thead>
									<tr>
										<th>First Name:</th>
										<th>Last Name:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="firstname">
										</td>
										<td>
											<input type="text" id="lastname">
										</td>
									</tr>
								</tbody>
							</table>
							<p>
							Thank you.
							</p>
							<p>
							You have the opportunity to take advantage of our very special promotion today to join <b>Road Assist 24/7</b> at a discounted rate that includes excellent emergency roadside services. They will bring you a gallon of gas, fix a flat tire, or tow your car.	
							</p>
							<p>
							<b>In addition, member benefits include exceptional savings</b> on Hotels, Rental Cars, and Entertainment Packages up to 50% off. What most customers think is GREAT about this program is the discounts alone <b>could more</b> than pay for the membership. 
							</p>
							<p>
							Now, Mr[s] <span class="ln">______</span>, you’re not the only driver in your household, <b>right</b>?
							</p>
								<ul>
									<li>
									If No: Okay. One of the key benefits is that you (and your family) can use all the benefits and discounts. It covers you and 3 other drivers in your household. It's like getting 4 motor clubs for the price of one!
									</li>
								</ul>
							<p>
								<ul>
									<li> 
									If Yes: Great because the way this works is that you (and your family) can use all the benefits and discounts. It covers you and 3 other drivers in your household.  It’s like getting 4 motor clubs for the price of one! Would you like to get them covered as well?
									</li>
								</ul>
							</p>
							<p>
							So even though you didn't dial our number directly, you can take advantage of this special offer. You will receive the next month for <b>only $1.95</b>. After that it's only $14.95 per month. Keep in mind there is no obligation to continue and there are no contracts so you can cancel at anytime.
							</p>
							<p>
							Now to take advantage of this special offer you can use a debit or credit card. Is that OK? [pause for response] Which will you be using? (Visa or MasterCard only)
							</p>
							<p>
							[Go to Gather Information]
							</p>
							<p>
							<b>IF CUSTOMER STATES: I was trying to reach [company name]</b>: It's possible that number may have been disconnected or you may have dialed the wrong number.  But, since you took the time to answer the questions, you can still take advantage of this special offer from Road Assist 24/7. OK?
							</p>
							<h3 style="color: red;">
							Sales Confirmation
							</h3>
							<p>
							[Gather Information]
							</p>
							<p>
							And can I have your full mailing address and phone number please?
							</p>
							<table class="holder">
								<thead>
									<tr>
										<th>Address 1:</th>
										<th>Address 2 (cont'd):</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="addr1">
										</td>
										<td>
											<input type="text" id="addr2">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder">
								<thead>
									<tr>
										<th>City:</th>
										<th>State:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="city">
										</td>
										<td>
											<select id="state">
											<option>AL</option><option>AK</option><option>AZ</option><option>AR</option><option>CA</option><option>CO</option><option>CT</option><option>DE</option><option>FL</option><option>GA</option><option>HI</option><option>ID</option><option>IL</option><option>IN</option><option>IA</option><option>KS</option><option>KY</option><option>LA</option><option>ME</option><option>MD</option><option>MA</option><option>MI</option><option>MN</option><option>MS</option><option>MO</option><option>MT</option><option>NE</option><option>NV</option><option>NH</option><option>NJ</option><option>NM</option><option>NY</option><option>NC</option><option>ND</option><option>OH</option><option>OK</option><option>OR</option><option>PA</option><option>RI</option><option>SC</option><option>SD</option><option>TN</option><option>TX</option><option>UT</option><option>VT</option><option>VA</option><option>WA</option><option>WV</option><option>WI</option><option>WY</option><option>PR</option>
											</select>
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder">
								<thead>
									<tr>
										<th>Zip:</th>
										<th>Phone:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width: 50% !important;">
											<input type="text" id="zip" style="width: 54.5% !important; float: left !important;">
											<input type="text" id="zip4" style="width: 43.5% !important; float: left !important;">
										</td>
										<td>
											<input type="text" id="phone">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder3">
								<thead>
									<tr>
										<th>Second Full Name:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="secondname">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder3">
								<thead>
									<tr>
										<th>Third Full Name:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="thirdname">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder3">
								<thead>
									<tr>
										<th>Fourth Full Name:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="fourthname">
										</td>
									</tr>
								</tbody>
							</table>
							<p>
							[Choose one, depending on situation]
							</p>
							<p>
								<ul>
									<li>
									For $1.95 today to start your trial, would that be a Visa or Mastercard?
									</li>
								</ul>
  							</p>
							<p>
							(WE CANNOT TAKE DISCOVER OR AMERICAN EXPRESS)
							</p>
							<p>
							[Capture Payment Information]
							</p>
							<p>
								<b>
									Payment Type: (Visa, MasterCard ONLY)
								</b>
							</p>
							<br>
							<br>
							<table class="holder3">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td id="place1">
											<button type="button" class="btn btn-danger" id="startstopbutton">STOP RECORDING</button>
										</td>
									</tr>
								</tbody>
							</table>
							<br>
							<br>
							<table class="holder">
								<thead>
									<tr>
										<th>Credit Card #:</th>
										<th>Credit Card Expiration:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="password" id="cc">
										</td>
										<td>
											<input type="text" id="mmyy">
										</td>
									</tr>
								</tbody>
							</table>
							<table class="holder">
								<thead>
									<tr>
										<th>Name On Card:</th>
										<th>3-digit Security Code:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="nameoncard">
										</td>
										<td>
											<input type="text" id="cvv">
										</td>
									</tr>
								</tbody>
							</table>
							<br>
							<br>
							<table class="holder3">
								<thead>
									<tr>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td id="place2">
										</td>
									</tr>
								</tbody>
							</table>
							<br>
							<br>
							<p>
								<u>
									<b>
									Note to Rep: If name on credit card is NOT the person you are speaking with ask, “Are you an authorized user on this card?”
									</b>
								</u>
							</p>
							<table class="holder2">
								<thead>
									<tr>
										<th>Are you an authorized user on this card?:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="checkbox" style="height: 50px; width: 50px;" id="auth">
										</td>
									</tr>
								</tbody>
							</table>
							<br>
							<p>
							<b>Note to Agent:</b> Never repeat credit card information back to the customer.  If the customer asks why you aren’t verifying the card number add: “Road Assist 24/7 takes your privacy and security very seriously.  The information you gave me is encrypted and as it is entered I do not have the ability to see it.  Please read the number slowly, 4 digits at a time”.
							</p>
							<p>
							[If credit card expiration date is within 30 days of call, add: Since your credit card expiration date is within the month, have you received your new card?]
							</p>
							<p>
								<ul>
									<li>If Yes: [Capture New Expiration Date]</li>
									<li>If No: When you do, please call us with the new date (or ask for alternate card)</li>
								</ul>
							</p>
							<p>
							If Asked "What’s being charged to my card"?:  $1.95 for the first month and $14.95 monthly for the rest of your first annual membership.
							</p>
							<p>
								<ul>
									<li>If Yes: [Capture Credit Card Information]</li>
									<li>I’m sorry, Road Assist 24/7 is unable to process your membership.  Please feel free to call customer service at 1-888-280-7762 to inquire about a membership with Road Assist 24/7.
									</li>
								</ul>	
							</p>
							<p>
							From time to time we send updates and special offers to our members by email. Would that be OK?
							</p>
							<p>
							Is there an email address we may use?:
							</p>
							<p>
								<ul>
									<li>If No: I understand [continue with confirmation]</li>
									<li>If Yes: [enter email address and read it back to confirm]</li>
								</ul>	
							</p>
							<table class="holder3">
								<thead>
									<tr>
										<th>Email:</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<input type="text" id="email">
										</td>
									</tr>
								</tbody>
							</table>
							<p>
							Mr(s). <span class="ln">______</span>, at some point during your membership, your credit card company may send you a new card number. Road Assist 24/7 would appreciate your calling the customer service number, toll-free, to let them know if there has been a change.
							</p>
							<br>
							<table class="holder3" style="display: none;" id="sub">
								<thead>
									<tr>
										<th style="text-align: center;">BE SURE INFORMATION IS ENTERED PROPERLY!</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<button type="button" class="btn btn-danger btn-lg" id="submit" style="width: 100% !important;">
											SUBMIT
											</button>
										</td>
									</tr>
								</tbody>
							</table>   
						</div>
						<div class="tab-pane" id="2b">
          					<embed src="docs/qa.pdf#FitW" style="height: 100%; width: 100%;">
						</div>
						<div class="tab-pane" id="3b">
							<h3>
							CONFIRMATION:
							</h3>
							<br>
							<p>
							Your credit card will initially be charged $1.95 for the first 1 month of your annual membership and then $14.95 monthly automatically. Membership dues will continue to be billed automatically to your credit card.  Each year you will receive a renewal membership kit stating your renewal dues. Road Assist 24/7 is not responsible for any overdrafts.  If you decide to cancel, you can simply call our customer service department. Do you have a pen handy?  (Wait until member is ready) That number is 1-888-280-7762.  Membership will automatically continue unless you call to cancel.
							</p>
							<p>
							Your official membership number is <span id="accnumber" style="color: green;">__________</span>.  The “800” number for 24-hour emergency road service is the also the one I just gave you.  Carry these numbers with you until you receive your membership card.  It takes about 24 hours for us to enter your membership number into the system. 
							</p>
							<p>
							Mr(s) <span class="ln">______</span>, even if you didn't intend to call Road Assist 24/7, we look forward to serving you.
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row" id="bottomportion">
				<div class="col-xs-5"></div>
				<div class="col-xs-2">
				</div>
				<div class="col-xs-5"></div>
			</div>	

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 align="center" class="modal-title">RESULTS</h4>
      </div>
      <div class="modal-body">
        <p align="center" id="oner">LOADING</p>
        <p align="center" id="twoer">PLEASE WAIT</p>
        <p align="center" id="threer"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="criticalbutton">Close</button>
      </div>
    </div>

  </div>
</div>

		</div>

		<script>

		var lead_id = "<?php echo $lead_id; ?>";
		var user = "<?php echo $user; ?>";
		var vendor_lead_code = "<?php echo $vendor_lead_code; ?>";
		var server_ip = "<?php echo $server_ip; ?>";

		<?php

			if(isset($inboundphonenumber))
			{
				echo "$('#phone').val('" . $inboundphonenumber . "');";
			}

		?>


		</script>

		<script src="js/userexperience.js?v=1"></script>
		<script src="js/creditcard.js?v=1"></script>

	</body>
</html>
