<!DOCTYPE html>
<html lang="en">
<head>

	<title>{{isset($title) ? $title : 'Home'}}</title>

	<!-- Required meta tags always come first -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- Main Font -->
    <script src="{{asset('assets/js/webfontloader.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

	<!-- Bootstrap CSS -->
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap-reboot.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/Bootstrap/dist/css/bootstrap-grid.css')}}">

	<!-- Main Styles CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fonts.min.css')}}">

	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

	    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="page-has-left-panels">



<!-- Preloader -->

<div id="hellopreloader">
	<div class="preloader">
		<svg width="45" height="45" stroke="#fff">
			<g fill="none" fill-rule="evenodd" stroke-width="2" transform="translate(1 1)">
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="1.5s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="6" stroke="none">
					<animate attributeName="r" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="6;22"/>
					<animate attributeName="stroke-opacity" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="1;0"/>
					<animate attributeName="stroke-width" begin="3s" calcMode="linear" dur="3s" repeatCount="indefinite" values="2;0"/>
				</circle>
				<circle cx="22" cy="22" r="8">
					<animate attributeName="r" begin="0s" calcMode="linear" dur="1.5s" repeatCount="indefinite" values="6;1;2;3;4;5;6"/>
				</circle>
			</g>
		</svg>

		<div class="text">Loading ...</div>
	</div>
</div>

<!-- ... end Preloader -->

<!-- Fixed Sidebar Left -->

@include('layouts.admin.partials.sidebar')

<!-- ... end Fixed Sidebar Left -->





<!-- Header-BP -->

<header class="header" id="site-header">

	<div class="page-title">
		<h6>{{isset($title) ? $title : 'Dashboard'}}</h6>
	</div>

	<div class="header-content-wrapper">



		<div class="control-block">

			<div class="author-page author vcard inline-items more">
				<div class="author-thumb">
					<img alt="author" src="{{auth()->user()->image}}" class="avatar">
					<span class="icon-status online"></span>
					<div class="more-dropdown more-with-triangle">
						<div class="mCustomScrollbar" data-mcs-theme="dark">
							<div class="ui-block-title ui-block-title-small">
								<h6 class="title">Your Account</h6>
							</div>

							<ul class="account-settings">
								<li>
									<a href="{{URL_USERS_LOGOUT}}">
										<svg class="olymp-logout-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-logout-icon"></use></svg>

										<span onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</span>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									</a>
								</li>
							</ul>




						</div>

					</div>
				</div>
                <a href="#" class="author-name fn">
                    <div class="author-title">
                        {{ Auth::user()->name }} <svg class="olymp-dropdown-arrow-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-dropdown-arrow-icon"></use></svg>
                    </div>
                    <span class="author-subtitle">{{ Auth::user()->campaign->campaign }}</span>
                </a>
			</div>

		</div>
	</div>

</header>

<!-- ... end Header-BP -->


<!-- Responsive Header-BP -->

<header class="header header-responsive" id="site-header-responsive">

	<div class="header-content-wrapper">
		<ul class="nav nav-tabs mobile-app-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#request" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
						<div class="label-avatar bg-blue">6</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#chat" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-chat---messages-icon"></use></svg>
						<div class="label-avatar bg-purple">2</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#notification" role="tab">
					<div class="control-icon has-items">
						<svg class="olymp-thunder-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-thunder-icon"></use></svg>
						<div class="label-avatar bg-primary">8</div>
					</div>
				</a>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#search" role="tab">
					<svg class="olymp-magnifying-glass-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-magnifying-glass-icon"></use></svg>
					<svg class="olymp-close-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-close-icon"></use></svg>
				</a>
			</li>
		</ul>
	</div>

	<!-- Tab panes -->
	<div class="tab-content tab-content-responsive">

		<div class="tab-pane " id="request" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">FRIEND REQUESTS</h6>
					<a href="#">Find Friends</a>
					<a href="#">Settings</a>
				</div>
				<ul class="notification-list friend-requests">
					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar55-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tamara Romanoff</a>
							<span class="chat-message-item">Mutual Friend: Sarah Hetfield</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar56-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tony Stevens</a>
							<span class="chat-message-item">4 Friends in Common</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li class="accepted">
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar57-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">her wall</a>.
						</div>
									<span class="notification-icon">
										<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar58-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Stagg Clothing</a>
							<span class="chat-message-item">9 Friends in Common</span>
						</div>
									<span class="notification-icon">
										<a href="#" class="accept-request">
											<span class="icon-add without-text">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

										<a href="#" class="accept-request request-del">
											<span class="icon-minus">
												<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
											</span>
										</a>

									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
				</ul>
				<a href="#" class="view-all bg-blue">Check all your Events</a>
			</div>

		</div>

		<div class="tab-pane " id="chat" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Chat / Messages</h6>
					<a href="#">Mark all as read</a>
					<a href="#">Settings</a>
				</div>

				<ul class="notification-list chat-message">
					<li class="message-unread">
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar59-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Diana Jameson</a>
							<span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-chat---messages-icon"></use></svg>
									</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar60-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Jake Parker</a>
							<span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
									<span class="notification-icon">
										<svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-chat---messages-icon"></use></svg>
									</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar61-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
							<span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>

					<li class="chat-group">
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar11-sm.jpg')}}" alt="author">
							<img src="{{asset('assets/img/avatar12-sm.jpg')}}" alt="author">
							<img src="{{asset('assets/img/avatar13-sm.jpg')}}" alt="author">
							<img src="{{asset('assets/img/avatar10-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
							<span class="last-message-author">Ed:</span>
							<span class="chat-message-item">Yeah! Seems fine by me!</span>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-chat---messages-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-chat---messages-icon"></use></svg>
										</span>
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
						</div>
					</li>
				</ul>

				<a href="#" class="view-all bg-purple">View All Messages</a>
			</div>

		</div>

		<div class="tab-pane " id="notification" role="tabpanel">

			<div class="mCustomScrollbar" data-mcs-theme="dark">
				<div class="ui-block-title ui-block-title-small">
					<h6 class="title">Notifications</h6>
					<a href="#">Mark all as read</a>
					<a href="#">Settings</a>
				</div>

				<ul class="notification-list">
					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar62-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">Mathilda Brinker</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="un-read">
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar63-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<div>You and <a href="#" class="h6 notification-friend">Nicholas Grissom</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">9 hours ago</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="with-comment-photo">
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar64-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">Sarah Hetfield</a> commented on your <a href="#" class="notification-link">photo</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">Yesterday at 5:32am</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-comments-post-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-comments-post-icon"></use></svg>
										</span>

						<div class="comment-photo">
							<img src="{{asset('assets/img/comment-photo1.jpg')}}" alt="photo">
							<span>“She looks incredible in that outfit! We should see each...”</span>
						</div>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar65-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">Green Goo Rock</a> invited you to attend to his event Goo in <a href="#" class="notification-link">Gotham Bar</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 5th at 6:43pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="{{asset('assets/img/avatar66-sm.jpg')}}" alt="author">
						</div>
						<div class="notification-event">
							<div><a href="#" class="h6 notification-friend">James Summers</a> commented on your new <a href="#" class="notification-link">profile status</a>.</div>
							<span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">March 2nd at 8:29pm</time></span>
						</div>
										<span class="notification-icon">
											<svg class="olymp-heart-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-heart-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="{{asset('assets/svg-icons/sprites/icons.svg')}}#olymp-little-delete"></use></svg>
						</div>
					</li>
				</ul>

				<a href="#" class="view-all bg-primary">View All Notifications</a>
			</div>

		</div>

		<div class="tab-pane " id="search" role="tabpanel">


				<form class="search-bar w-search notification-list friend-requests">
					<div class="form-group with-button">
						<input class="form-control js-user-search" placeholder="Search here people or pages..." type="text">
					</div>
				</form>


		</div>

	</div>
	<!-- ... end  Tab panes -->

</header>

<!-- ... end Responsive Header-BP -->
<div class="header-spacer"></div>









<a class="back-to-top" href="#">
	<img src="{{asset('assets/svg-icons/back-to-top.svg')}}" alt="arrow" class="back-icon">
</a>

<div id="content">
@yield('content')
</div>


</div>

<!-- ... end Window-popup-CHAT for responsive min-width: 768px -->


<!-- JS Scripts -->
<script src="{{ asset('assets/js/jquery-3.2.1.js')}}"></script>
<script src="{{ asset('assets/js/jquery.appear.js')}}"></script>
<script src="{{ asset('assets/js/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/js/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/js/jquery.matchHeight.js')}}"></script>
<script src="{{ asset('assets/js/svgxuse.js')}}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.js')}}"></script>
<script src="{{ asset('assets/js/Headroom.js')}}"></script>
<script src="{{ asset('assets/js/velocity.js')}}"></script>
<script src="{{ asset('assets/js/ScrollMagic.js')}}"></script>
<script src="{{ asset('assets/js/jquery.waypoints.js')}}"></script>
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/popper.min.js')}}"></script>
<script src="{{ asset('assets/js/material.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap-select.js')}}"></script>
<script src="{{ asset('assets/js/smooth-scroll.js')}}"></script>
<script src="{{ asset('assets/js/selectize.js')}}"></script>
<script src="{{ asset('assets/js/swiper.jquery.js')}}"></script>
<script src="{{ asset('assets/js/moment.js')}}"></script>
<script src="{{ asset('assets/js/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/js/simplecalendar.js')}}"></script>
<script src="{{ asset('assets/js/fullcalendar.js')}}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.js')}}"></script>
<script src="{{ asset('assets/js/ajax-pagination.js')}}"></script>
<script src="{{ asset('assets/js/Chart.js')}}"></script>
<script src="{{ asset('assets/js/chartjs-plugin-deferred.js')}}"></script>
<script src="{{ asset('assets/js/circle-progress.js')}}"></script>
<script src="{{ asset('assets/js/loader.js')}}"></script>
<script src="{{ asset('assets/js/run-chart.js')}}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js')}}"></script>
<script src="{{ asset('assets/js/jquery.gifplayer.js')}}"></script>
<script src="{{ asset('assets/js/mediaelement-and-player.js')}}"></script>
<script src="{{ asset('assets/js/mediaelement-playlist-plugin.min.js')}}"></script>
<script src="{{ asset('assets/js/ion.rangeSlider.js')}}"></script>

<script src="{{ asset('assets/js/base-init.js')}}"></script>
<script defer src="{{ asset('assets/fonts/fontawesome-all.js')}}"></script>
<script src="{{ asset('assets/Bootstrap/dist/js/bootstrap.bundle.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@yield('javascript')

</body>
</html>
