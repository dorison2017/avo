<!doctype html>
<html><!-- InstanceBegin template="/Templates/standard.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="Content-Type" content="text/html; charset=UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> 
	<link rel="stylesheet" href="/styles/reset.css">
	<link rel="stylesheet" href="/styles/cssmenu.css">
	<link rel="stylesheet" href="/styles/site.css">
	<link rel="stylesheet" href="/styles/font-awesome.css">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
  	<!-- InstanceBeginEditable name="doctitle" -->
	<title>AVO Health | Contact Us</title>
	<!-- InstanceEndEditable -->
	<!-- InstanceBeginEditable name="head" -->
	<meta name="Description" content="AVO Health - what do they do? Insert a description of the company here, including a tag line if there is one">
<?php 
$TEST_EMAIL = true; // Set this to false before publishing the site

// read POST variables 
$Submit = $_POST['submit'];

$Name = $_POST['name'];
$Address = $_POST['address'];
$Phone = $_POST['telephone'];
$Email = $_POST['email'];
$Enquiry = $_POST['enquiry'];

//	If $Submit contains the value "Submit" it means the user clicked the submit button, 
//  so validate the input, and create some database records with the entered details 
if ($Submit == "Submit my query")
{
	/* Validate Input */
	if ($Name == "")
	{
		$Invalid_Input = "Y";
		$InvalidName = "Y";
	}
	if ($Address == "")
	{
		$Invalid_Input = "Y";
		$InvalidAddress = "Y";
	}
	if ($Phone == "")
	{
		$Invalid_Input = "Y";
		$InvalidContactMethod = "Y";
	}
	if ($Invalid_Input != "Y")
	{
		// SEND AN EMAIL WITH THE DETAILS ENTERED ON THE FORM
		$headers = "";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Transfer-Encoding: 8bits\n";
		$headers .= "Content-Type: text/html; charset='ISO-8859-1'\n";
		$headers .= "X-Mailer: PHP4\n"; //mailer
		$headers .= "X-Priority: 3\n"; //1 UrgentMessage, 3 Normal

		if ($Email != "") {
			$headers .= "From: " . $Email . "\n";
			$headers .= "Reply-To: " . $Email . "\n";
		}

		// Format an email message in HTML, so it looks nice 
		$Txt .= "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>";
		$Txt .= "<html><head></head><body>";
		$Txt .= "<p><h1>Enquiry from Christie Glass Website</h1></p>";
		$Txt .= "<p><h2>The following information was entered at: " . date('jS M Y h:ia') . "</h2></p>";

		$Txt .= "<table width='80%' border='1' cellspacing='1' cellpadding='1' bgcolor='#A6B6D2'>";
		$Txt .= "<tr><td width = 30%>Name</td><td>" . $Name . "</td></tr>";
		$Txt .= "<tr><td>Address</td><td>" . $Address . "</td></tr>";
		$Txt .= "<tr><td>Phone</td><td>";
		$Txt .= (($Phone) ? $Phone : "&nbsp;");
		$Txt .= "</td></tr>";
		$Txt .= "<tr><td>Email</td><td>";
		$Txt .= (($Email) ? $Email : "&nbsp;");
		$Txt .= "</td></tr>";
		$Txt .= "<tr><td>Comments</td><td>";
		$Txt .= (($Enquiry) ? $Enquiry : "&nbsp;");
		$Txt .= "</td></tr>";
		$Txt .= "</table><br>";
		$Txt .= "</body></html>";

		$EmailAddr = 'email@address.co.uk';
		//mail($EmailAddr, "Contact From AVO Website", $Txt, $headers);
		// set this flag indicating that everything was saved okay
		$Submit_Result = 1;
	}
}
?>
<!-- InstanceEndEditable -->
</head>

<body>
	<header>
		<menu>
			<?php require_once('code/topmenu.php'); ?>
		</menu>
		<banner>
			<!-- InstanceBeginEditable name="slideshow" -->
			<slideshow>
				<img class="cross-fade banner-image active" data-index="1" title="image 1 title" src="/images/banner1.jpg" />
			</slideshow>
			<div id="slideshow-images" class="hidden">
				<span data-title="image 2 title" data-src="/images/banner2.jpg"></span>
				<span data-title="image 3 title" data-src="/images/banner3.jpg"></span>
				<span data-title="image 4 title" data-src="/images/banner4.jpg"></span>
				<span data-title="image 5 title" data-src="/images/banner5.jpg"></span>
				<span data-title="image 6 title" data-src="/images/banner6.jpg"></span>
				<span data-title="image 7 title" data-src="/images/banner7.jpg"></span>
			</div>
			<!-- InstanceEndEditable -->
			<a class="logo-wrapper" href="/">
				<img class="logo" src="/images/logo.png" />
				<span class="logo-caption">Easing the burden</span>
			</a>
		</banner>
		<tagline>
			<!-- InstanceBeginEditable name="tagline" -->
			AVO Health Limited
			<!-- InstanceEndEditable -->
		</tagline>
	</header>
	<content>
	<ul class="sidemenu"></ul>
	<!-- InstanceBeginEditable name="content" -->
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>"  method="post" enctype="multipart/form-data" id="enqform" name="enqform" onSubmit="return ValidateForm();">
      <p>
        <label for="name" class="formtext">Name:
          <?php
	  	if ($InvalidName == "Y")
			echo "<span class='redtext'> (please enter)</span>";
	  ?>
        </label>
        <input name="name" id="name" class="txt" value="<?php echo stripslashes($Name) ?>" size=30>
      </p>
      <p>
        <label for="address" class="formtext">Location:
          <?php
	  	if ($InvalidAddress == "Y")
			echo "<span class='redtext'> (please enter)</span>";
	  ?>
        </label>
        <textarea name="address" id="address" cols="46" rows="5" class="txt"><?php echo stripslashes($Address) ?></textarea>
      </p>
      <p>
        <label for="Telephone" class="formtext">Phone:
          <?php
	  	if ($InvalidContactMethod == "Y")
			echo "<span class='redtext'> (please enter)</span>";
	  ?>
        </label>
        <input name="telephone" id="telephone" class="txt" value="<?php echo stripslashes($Phone) ?>" size=30>
      </p>
      <p>
        <label for="email" class="formtext">Email: <span id='emailerror' class='redtext'></span> </label>
        <input name="email" id="email" class="txt" value="<?php echo stripslashes($Email) ?>" size=30>
      </p>
      <p>
        <label for="enquiry" class="formtext">Your enquiry:</label>
        <textarea name="enquiry" id="enquiry" cols=46 rows=10 class="txt"><?php echo stripslashes($Enquiry) ?></textarea>
      </p>
      <?php
			if ($Submit_Result != 1) { ?>
	  <p>
	    <span class="formtext"></span>
		<input class='formsubmit' name='submit' type=submit value='Submit my query'>
	  </p>
      <?php
			} else if ($TEST_EMAIL) {
		    	echo $Txt;
			}
		?>
    </form>
	<div class="mapblock">
		<div class="address">
			Plot 3, Block 9<br>
			Ishaya Shekari Crescent<br>
			Wole Soyinka Avenue<br>
			Gwarinpa 900108<br>
			Abuja FCT<br>
			Tel: + 44 208 1503641<br>
			Tel: + 234 9 2912635<br>
			Email: <a href='mailto:abujaoffice@avohealth.org'>abujaoffice@avohealth.org</a>    
		</div>
		<div class="googlemap" id="googlemap"></div>
	</div>  
	<!-- InstanceEndEditable -->
	</content>
	<footer>
		&copy; <?php echo date("Y"); ?> AVO Health
	</footer>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="/scripts/cssmenu.js"></script>
<script src="/scripts/avo.js"></script>
<!-- InstanceBeginEditable name="scripts" -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&v=3&libraries=geometry"></script>
<script type="text/javascript" src="/scripts/infobubble.js"></script>
<script type="text/javascript">
	this.lat=9.1157907071232981;
	this.lng=7.4234250770263672;
	this.zoomlvl=16; 
	this.latlng = new google.maps.LatLng(this.lat, this.lng);
	this.myOptions = {		
		zoom: this.zoomlvl,
		center: this.latlng,
		scrollwheel: false,
		streetViewControl: false,
		scaleControl: true,
		mapTypeId: google.maps.MapTypeId.TERRAIN
	};
	avo.map = new google.maps.Map(document.getElementById("googlemap"), this.myOptions);

	avo.infoContent = "<div style='width:350px; height:180px; overflow:hidden;'><div style='background-image: url(/images/banner1.jpg); background-position: center center; background-size: cover; height: 100%; opacity: 0.2; position: absolute; width: 100%;'></div><div style='position:absolute; padding:20px;'>Plot 3, Block 9<br>Ishaya Shekari Crescent<br>Wole Soyinka Avenue<br>Gwarinpa 900108<br>Abuja FCT<br>Tel: + 44 208 1503641<br>Tel: + 234 9 2912635<br>Email: <a href='mailto:abujaoffice@avohealth.org'>abujaoffice@avohealth.org</a></div></div>";

	avo.infoBubble = new InfoBubble({
	  map: avo.map,
	  position: this.latlng,
	  content: avo.infoContent,
	  shadowStyle: 1,
	  padding: 0,
	  borderRadius: 5,
	  arrowSize: 10,
	  borderWidth: 1,
	  borderColor: '#2c2c2c',
	  disableAutoPan: true,
	  hideCloseButton: false,
	  arrowPosition: 30,
	  backgroundClassName: 'transparent',
	  arrowStyle: 2
	});	

	var marker = new google.maps.Marker({
		position: this.latlng, 
		map: avo.map, 
 		//icon: 'images/logo.png',
 		title: 'AVO Health Limited'
	});   

	avo.infoBubble.setContent(avo.infoContent);

	$(window).on('resize orientationchange', function() {
		avo.map.panTo(this.latlng);
	});
	google.maps.event.addListener(avo.map, 'click', function() {
		try {
			avo.infoBubble.close();
		} catch(e) {}
	});
	google.maps.event.addListener(marker, 'click', function() {
		try {
			avo.infoBubble.close();
		} catch(e) {}
		
		avo.infoBubble.open();
	});

</script>
<!-- InstanceEndEditable -->
<!-- InstanceEnd --></html>
