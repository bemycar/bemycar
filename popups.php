<div>
	<div class='c-popup js-signin-popup'>
		<h4 class="c-popup__header">Sign In</h4>
		<div class="c-popup__close js-popup-close"></div>
		<input type='text' id='email' name='email' placeholder='email'>
		<input type='text' id='password' name='password' placeholder='password'>
		<button class="c-btn" type='button' id='login'>Log In</button>
		<p id='signupdrop' class="c-popup__inside-prompt js-header-signup js-popup c-header__signup" role="button">Not got an account yet? Sign up</p>
	</div>

	<div class='c-popup js-signup-popup'>

		<h4 class="c-popup__header">Sign Up</h4>
		<div class="c-popup__close js-popup-close"></div>
		<form action='signup.php' method='POST'>
			<input type='text' id='signup_email'  name='email' placeholder='Email'>
			<input type='text'  id='signup_name' name='signup_name' placeholder='Name'>
			<input type='text'  id='signup_password' name='password' placeholder='Password'>
			<input type='text'  id='signup_password2' name='password2' placeholder='Confirm Password'>
			<!-- <input type='text'  id='number' name='number' placeholder='Phone Number'> -->

			<button class="c-btn" id='signup_button' type='button' id='login'>Sign Up</button>

		</form>

	</div>

	<div class='c-popup js-contact-popup'>

		<h4 class="c-popup__header">Email Seller</h4>
		<div class="c-popup__close js-popup-close"></div>
		<form action='sendmail.php' method='POST' id='sendmailform'>

			<input type='text' id='email' name='email' placeholder='email'>
			<textarea id='message' name='message' placeholder='message'></textarea>
			<button class="c-btn" type='button' id='sendmail'>SEND</button>

		</form>
	</div>

	<div class='c-popup js-video-popup c-popup__video'>

		<h4 class="c-popup__header">How to use</h4>
		<div class="c-popup__close js-popup-close"></div>

		<div class="js-video-popup-embed o-video-wrapper">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/5pwVU3FGZnE" frameborder="0" allowfullscreen></iframe>
		</div>

	</div>

</div>
