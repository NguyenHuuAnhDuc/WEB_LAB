<div id="id01" class="modal">
	<form class="modal-content animate" action="./login_processing.php" method="post">
		<div class="imgcontainer">
		<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
		<img src="image/us.png" alt="Avatar" class="avatar">
		</div>

		<div class="container">
		<p>
    <?php
      if (isset($_SESSION["error"])) {
        echo "<div style='color:red'>" . $_SESSION["error"] . "</div>";
        unset($_SESSION["error"]);
      }
    ?>
			<label for="uname"><b>Username</b>
        <span id="uname" class="w3-right"></span>
      </label>
			<input onkeyup='ver();' type="text" placeholder="Enter Username" id="username" name="username" title="Enter your username" required>
		</p>
		<p>
		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" id="psw" name="psw" title="Must contain at least 8 characters, an uppercase, an lowercase and a number" required>
		<!-- pattern="(?=.*\S)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" -->
		</p>
		<button class="lo" type="submit" name="btnSub">Login</button>
		<label>
			<input type="checkbox" checked="checked" name="remember"> Remember me
      <span class="psw">Forgot <a style="color:darkblue; text-decoration:underline;" href="#">
		    password?</a>
		  </span>
		</label>
    <br>
		<label>Don't have an account? <a style="color:darkblue" href="index.php?page=register#id02">
      Sign up</a>
    </label>
		</div>

		<div id="message">
		<h4>Password must contain the following:</h4>
		<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
		<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
		<p id="number" class="invalid">A <b>number</b></p>
		<p id="length" class="invalid">Minimum <b>8 characters</b></p>
		<p id="space" class="valid"> No <b>white space</b></p>
		</div>
	</form>
</div>   
<script>
// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('id01');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// modal.addEventListener('click', function(event) {
//   event.stopPropagation()
// })

/*for username */
var username = document.getElementById("username");
/*for display message for username */
username.onfocus = function() {
  document.getElementById("uname").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
username.onblur = function() {
  document.getElementById("uname").style.display = "none";
}
const reg = /^[a-zA-Z0-9_]*$/;
var ver = function() {
  if(reg.test(username.value)){
    document.getElementById('uname').style.color = 'blue';
    document.getElementById('uname').innerHTML = 'Username: correct format';
  }else{
    document.getElementById('uname').style.color = 'red';
    document.getElementById('uname').innerHTML = 'Username: incorrect format';
  }
}

var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var space = document.getElementById("space");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  var white = /^\S*$/;
  if(myInput.value.match(white)){
    space.classList.remove("invalid");
    space.classList.add("valid");
  }else{
    space.classList.remove("valid");
    space.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>