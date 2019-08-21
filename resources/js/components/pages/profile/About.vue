<template>
<span>	
 
<ProfileHeader />

<div class="container">
	<div class="row">

		<!-- Main Content -->

		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			 			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Personal Info</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
				<div class="ui-block-content">

					
					<!-- W-Personal-Info -->
					
					<ul class="widget w-personal-info">
						<li>
							<span class="title">About Me:</span>
							<span class="text">Hi, I’m James, I’m 36 and I work as a Digital Designer for the
													“Daydreams” Agency in Pier 56
												</span>
						</li>
						<li>
							<span class="title">Birthday:</span>
							<span class="text">December 14th, 1980</span>
						</li>
						<li>
							<span class="title">Birthplace:</span>
							<span class="text">Austin, Texas, USA</span>
						</li>
						<li>
							<span class="title">Lives in:</span>
							<span class="text">San Francisco, California, USA</span>
						</li>
						<li>
							<span class="title">Occupation:</span>
							<span class="text">UI/UX Designer</span>
						</li>
						<li>
							<span class="title">Joined:</span>
							<span class="text">April 31st, 2014</span>
						</li>
						<li>
							<span class="title">Gender:</span>
							<span class="text">Male</span>
						</li>
						<li>
							<span class="title">Status:</span>
							<span class="text">Married</span>
						</li>
						<li>
							<span class="title">Email:</span>
							<a href="#" class="text">jspiegel@yourmail.com</a>
						</li>
						<li>
							<span class="title">Website:</span>
							<a href="#" class="text">daydreamsagency.com</a>
						</li>
						<li>
							<span class="title">Phone Number:</span>
							<span class="text">(044) 555 - 4369 - 8957</span>
						</li>
						<li>
							<span class="title">Religious Belifs:</span>
							<span class="text">-</span>
						</li>
						<li>
							<span class="title">Political Incline:</span>
							<span class="text">Democrat</span>
						</li>
					</ul>
					
					<!-- ... end W-Personal-Info -->
					<!-- W-Socials -->
					
					<div class="widget w-socials">
						<h6 class="title">Other Social Networks:</h6>
						<a href="#" class="social-item bg-facebook">
							<i class="fab fa-facebook-f" aria-hidden="true"></i>
							Facebook
						</a>
						<a href="#" class="social-item bg-twitter">
							<i class="fab fa-twitter" aria-hidden="true"></i>
							Twitter
						</a>
						<a href="#" class="social-item bg-dribbble">
							<i class="fab fa-dribbble" aria-hidden="true"></i>
							Dribbble
						</a>
					</div>
					
					
					<!-- ... end W-Socials -->
				</div>
			</div>

		 
		</div>

		<!-- ... end Main Content -->


 

 

	</div>
</div>
 
 
</span>
</template>

<script>
	import ProfileHeader from './ProfileHeader';
	
	
	export default {
		name: 'ProfileEuraka',
		components: { 
						ProfileHeader,
					}
	}
</script>