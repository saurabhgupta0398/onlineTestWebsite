<?php include'template/server.php';
if(isset($_SESSION['username']))
{
	if($_SESSION['username']!="admin")
	header("location:template/index.php");
else
	header("location:template/insert.php");
}?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
    .s1
    {
    	color: white;
    }
	</style>
	<title>
		Registration
	</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
  
<body background="image2.jpg" style="background-size: 1400px 670px; background-repeat: no-repeat;background-attachment: fixed;">

<h2 class="row justify-content-center " style="color:orange;font-family: Comic Sans MS;margin-top: 10px;">रजिस्ट्रेशन पेज</h2>
<div class="row justify-content-center ">
	<!-- <div class="jumbotron" > -->

<form action="registration.php" method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
	<?php include 'template/errors.php'; ?>
	<div class="form-group">
	<label class="s1">यूज़र नेम</label>
	<input type="text" name="username" class="form-control" value="<?php echo $username;?>" placeholder="यूज़र नेम" size="35" required></div>
	<div class="form-group">
	<label class="s1">ईमेल आइडी</label>
	<input type="email" class="form-control"   placeholder="ईमेल आइडी"  name="email" value="<?php echo $email;?>" required></div>
	<div class="form-group">
	<label class="s1">पासवर्ड</label>
	<input type="password" class="form-control"  placeholder="पासवर्ड"  name="password1" minlength="8"  required></div>
	<div class="form-group">
	<label class="s1">पासवर्ड कन्फ़र्म करें</label>
	<input type="password" class="form-control"   placeholder="पासवर्ड कन्फ़र्म करें"  name="password2" minlength="8" required></div>
	<div class="form-group">
	<label class="s1">मोबाइल नंबर</label>
	<input type="text" class="form-control"   placeholder="मोबाइल नंबर(10 अंक)" value="<?php echo $phone;?>" name="phone" minlength="10" required></div>
	<div class="form-group">
	<label class="s1">शहर</label>
	<input type="text" class="form-control"   placeholder="शहर"  name="city" value="<?php echo $city;?>" required></div>
	<div class="form-group">
	<label class="s1">राज्य/केंद्र शासित राज्य</label>
	<select class="form-control" name="state">
		<option value="Andhra Pradesh">आंध्रा प्रदेश	</option>
		<option value="Arunachal Pradesh">अरुणाचल प्रदेश</option>
		<option value="Assam">असम</option>
		<option value="Bihar">बिहार</option>
		<option value="Chhattisgarh">छत्तीसगढ़</option>
		<option value="Goa">गोवा</option>
		<option value="Gujarat">गुजरात</option>
		<option value="Haryana">हरियाणा</option>
		<option value="Himachal Pradesh">हिमाचल प्रदेश</option>
		<option value="Jammu and Kashmir">जम्मू और कश्मीर</option>
		<option value="Jharkhand">झारखंड</option>
		<option value="Karnataka">कर्नाटक</option>
		<option value="Kerala">केरला</option>
		<option value="Madhya Pradesh">मध्य प्रदेश</option>
		<option value="Maharashtra">महाराष्ट्र</option>
		<option value="Manipur">मणिपुर</option>
		<option value="Meghalaya">मेघालय</option>
		<option value="Mizoram">मिज़ोरम</option>
		<option value="Nagaland">नागालैंड</option>
		<option value="Odisha">ओड़ीशा</option>
		<option value="Punjab">पंजाब</option>
		<option value="Rajasthan">राजस्थान</option>
		<option value="Sikkim">सिक्किम</option>
		<option value="Tamil Nadu">तमिल नाडु</option>
		<option value="Telangana">तेलंगाना</option>
		<option value="Tripura">त्रिपुरा</option>
		<option value="Uttar Pradesh">उत्तर प्रदेश</option>
		<option value="Uttarakhand">उत्तराखंड</option>
		<option value="West Bengal">पश्चिम बंगाल</option>
		<option value="Andaman and Nicobar Islands">अंडमान और निकोबार द्वीप</option>
		<option value="Chandigarh">चंडीगढ़</option>
		<option value="Dadar and Nagar Haveli">दादर और नगर हवेली</option>
		<option value="Daman and Diu">दमन और ड्यू</option>
		<option value="Delhi">दिल्ली</option>
		<option value="Lakshadweep">लक्षद्वीप</option>
		<option value="Puducherry">पुडुचेरी</option>
			

	</select>
    </div>
	<div class="form-group">
	<label class="s1">विभाग</label>
	<input type="text" class="form-control"  placeholder="विभाग"  name="department" value="<?php echo $department;?>" required></div>
	<div class="form-group">
	<label class="s1">सेक्युर्टी प्रशन</label>
	<input type="text" class="form-control"  placeholder="प्रशन"  name="squestion" value="<?php echo $squestion;?>" required></div>
	<div class="form-group">
	<label class="s1">उत्तर</label>
	<input type="text" class="form-control"  placeholder="उत्तर"  name="sanswer" value="<?php echo $sanswer;?>" required></div>
	<div class="form-group">
		<input type="checkbox" name="checkbox" value="check" id="agree" /> <a href="terms.html" style="color: white">शर्तें</a>
	</div>
	<div class="form-group">
	<button type="submit" class="btn btn-primary" name="reg_user">रजिस्टर करें</button> </div>
	<div class="form-group">
	<b class="s1"><p >रजिस्टर किया हुआ हैं?</p><a href="login.php" style="color: white">लॉग इन</a></b>
	</div>
</form>
<!-- </div> -->
</div>

</body>
</html>