<?php
// Routes


try
{
	$pdo = new PDO("dblib:host=172.16.80.50\MAINSQLB", "sa", "k!p@ny52");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e)
{
    die("{'CardNum' : 'CONNECTION ERROR'}");
}

$app->add(function ($req, $res, $next)
{
	$response = $next($req, $res);
	return $response
		->withHeader('Access-Control-Allow-Origin', '*')
		->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
		->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS, HEAD, TRACE')
		->withHeader('Content-Type', 'application/json')
	;
});

$app->get('/abc', function ($request, $response, $args)
{

});

$app->post('/sale', function ($request, $response, $args) use ($pdo)
{
	$user = "f3dce3be";
	$password = "4c36bf2a70edcb372b3b";
	$Expiry = $request->getParam('Expiry');
	$CreditCard = $request->getParam('CreditCard');
	$CVV = $request->getParam('CVV');

	$agent = $request->getParam('user');
	$lead_id = $request->getParam('lead_id');
	$vendor_lead_code = $request->getParam('vendor_lead_code');
	$server_ip = $request->getParam('server_ip');

	$firstname = filter_var($request->getParam('firstname'), FILTER_SANITIZE_STRING);
	$lastname = filter_var($request->getParam('lastname'), FILTER_SANITIZE_STRING);
	$secondname = filter_var($request->getParam('secondname'), FILTER_SANITIZE_STRING);
	$thirdname = filter_var($request->getParam('thirdname'), FILTER_SANITIZE_STRING);
	$fourthname = filter_var($request->getParam('fourthname'), FILTER_SANITIZE_STRING);
	$addr1 = filter_var($request->getParam('addr1'), FILTER_SANITIZE_STRING);
	$addr2 = filter_var($request->getParam('addr2'), FILTER_SANITIZE_STRING);
	$city = filter_var($request->getParam('city'), FILTER_SANITIZE_STRING);
	$state = filter_var($request->getParam('state'), FILTER_SANITIZE_STRING);
	$zip = filter_var($request->getParam('zip'), FILTER_SANITIZE_STRING);
	$zip4 = filter_var($request->getParam('zip4'), FILTER_SANITIZE_STRING);
	$phone = filter_var($request->getParam('phone'), FILTER_SANITIZE_STRING);
	$email = filter_var($request->getParam('email'), FILTER_SANITIZE_STRING);
	$nameoncard = filter_var($request->getParam('nameoncard'), FILTER_SANITIZE_STRING);

	$authURL = "https://rtauth.telesolutions.com/44538ce1-d8c7-4664-8285-23a8656513b8";

	$accountnumber = $this->db->table('AccountNumbers')->where('status', '=', 0)->orderby('AccountNumber', 'ASC')->first()->AccountNumber;

	$data = [
				"User" => $user,
			 	"Password" => $password,
			 	"Expiry" => $Expiry,
			 	"CreditCard" => $CreditCard,
			 	"CVV" => $CVV
			];

//	var_dump($data);

	foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	$command = "curl -X POST '$authURL' -d '$fields_string' -k";

//	var_dump($command);
	exec($command, $output, $retval);

	$result = json_decode($output[0]);

//	echo $result->result;

	$mastertable = "INSERT INTO RoadTwentyFourSeven..GLSMaster (Program, Fname, Lname, Address, City, State, Zip, Phone, imported, timestamp) VALUES ('"
		. "GLS', "
		. "'$firstname', "
		. "'$lastname', "
		. "'$addr1', "
		. "'$city', "
		. "'$state', "
		. "'$zip', "
		. "'$phone', "
		. "1, "
		. "CURRENT_TIMESTAMP)"
;

	$pdo->query($mastertable);
	$lastinsertid = $pdo->lastInsertId();

//	$command = "curl -X GET 'http://172.16.82.12/vicidial/non_agent_api.php?source=GLS&user=0001&pass=dontuse&function=update_lead&lead_id=" . $lead_id . "&vendor_lead_code=" . $lastinsertid . "'";
	$command = "curl -X GET 'http://172.16.82.12/agc/api.php?source=GLSScript&user=0001&pass=dontuse&function=update_fields&agent_user=" . $agent . "&vendor_lead_code=" . $lastinsertid . "'";
	exec($command, $output2, $retval);

	if ($result->result == "AP")
	{
		$confirmation = $result->details;

		$accounttable = "UPDATE RoadTwentyFourSeven..AccountNumbers SET status='1' where AccountNumber = '$accountnumber'";

		$pdo->query($accounttable);

		//$salestable = "INSERT INTO RoadTwentyFourSeven..Sales (AccountNumber, StartDate, FirstName, LastName, SecondName, ThirdName, FourthName, Address1, Address2, City, State, Zip, Phone, CreditCard, CreditCardExp, PaymentMode, PaymentType, AgentCode, DRM, ProductCode, FlexBill, SalesRep, Status, vendor_lead_code, LeadID, NameOnCard)
		//			   VALUES ('$accountnumber', CURRENT_TIMESTAMP, '$firstname', '$lastname', '$secondname', '$thirdname', '$fourthname', '$addr1', '$addr2' '$city', '$state', '$zip', '$phone', EncryptByPassPhrase('12312834891234891234', '$CreditCard'), '$Expiry', '', '', '$agent', '', '', '', '', '', '$leadidgetter', '$lead_id', '$nameoncard')";

		$salestable = "INSERT INTO RoadTwentyFourSeven..Sales (SaleDate, AccountNumber, FirstName, LastName, Address1, Address2, City, State, Zip, Phone, CreditCard, CreditCardExp,
			PaymentMode, PaymentType, AgentCode, DRM, ProductCode, FlexBill, SalesRep, Status, LeadID, SecondName, ThirdName, FourthName, NameOnCard, confirmation, AssociateFullCoverage) 
			VALUES (CURRENT_TIMESTAMP, '$accountnumber', '$firstname', '$lastname', '$addr1', '$addr2', '$city', '$state', '$zip', 
			'$phone', EncryptByPassPhrase('12312834891234891234', '$CreditCard'), '$Expiry', '', '', '$agent', '', '$serverip', '$lead_id', '$lastinsertid', '', '$lastinsertid', '$secondname', '$thirdname', '$fourthname', '$nameoncard', '$confirmation', '$output2')";
		
		$pdo->query($salestable);
	}

	$result->accountnumber = $accountnumber;

	return json_encode($result);

});

$app->get('/record', function ($request, $response, $args) use ($pdo)
{
	$command = $request->getParam('command');
	$user = $request->getParam('user');
	$lead_id = $request->getParam('lead_id');
	$sequence = $request->getParam('sequence');

	$recordingid = $this->db2
		->table('recording_log')
		->select('recording_id')
		->where('lead_id', '=', $lead_id)
		->orderBy('start_time', 'desc')
		->first()
	;
/*
	DB::table('dbo.SecureRecordingLog')
		->insert([
			[
			'user' => $user,
			'lead_id' => $lead_id,
			'recordingid' => $recordingid,
			'action' => $command,
			]
		])
	;
*/
	$recording_id = $recordingid->recording_id;

	$query = "INSERT INTO RoadTwentyFourSeven..SecureRecordingLog ([user], [leadid], [recordingid], [sequence], [action]) VALUES ($user, $lead_id, $recording_id, $sequence, '$command')";

	$stmt =	$pdo->query($query);

	if ($stmt)
	{
		return json_encode(array("success" => "yes"));
	}
	else
	{
		return json_encode(array("success" => "no"));
	}		

});
