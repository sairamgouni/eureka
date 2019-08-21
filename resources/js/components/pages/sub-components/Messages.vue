<template>
	                <div class="control-icon more has-items">
                    <svg class="olymp-chat---messages-icon">
                        <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use>
                    </svg>
                    <div class="label-avatar bg-purple">2</div>

                    <div class="more-dropdown more-with-triangle triangle-top-center">
                        <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Chat / Messages</h6>
                            <a href="#">Mark all as read</a>
                            <a href="#">Settings</a>
                        </div>

                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <ul class="notification-list chat-message">
                                <li class="message-unread">
                                    <div class="author-thumb">
                                        <img src="assets/img/avatar59-sm.jpg" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="#" class="h6 notification-friend">Diana Jameson</a>
                                        <span class="chat-message-item">Hi James! It’s Diana, I just wanted to let you know that we have to reschedule...</span>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="2004-07-24T18:18">4 hours ago</time></span>
                                    </div>
                                    <span class="notification-icon">
        									<svg class="olymp-chat---messages-icon"><use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        								</span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </div>
                                </li>

                                <li>
                                    <div class="author-thumb">
                                        <img src="assets/img/avatar60-sm.jpg" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="#" class="h6 notification-friend">Jake Parker</a>
                                        <span class="chat-message-item">Great, I’ll see you tomorrow!.</span>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="2004-07-24T18:18">4 hours ago</time></span>
                                    </div>
                                    <span class="notification-icon">
        									<svg class="olymp-chat---messages-icon"><use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        								</span>

                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </div>
                                </li>
                                <li>
                                    <div class="author-thumb">
                                        <img src="assets/img/avatar61-sm.jpg" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="#" class="h6 notification-friend">Elaine Dreyfuss</a>
                                        <span class="chat-message-item">We’ll have to check that at the office and see if the client is on board with...</span>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="2004-07-24T18:18">Yesterday at 9:56pm</time></span>
                                    </div>
                                    <span class="notification-icon">
        										<svg class="olymp-chat---messages-icon"><use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        									</span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </div>
                                </li>

                                <li class="chat-group">
                                    <div class="author-thumb">
                                        <img src="assets/img/avatar11-sm.jpg" alt="author">
                                        <img src="assets/img/avatar12-sm.jpg" alt="author">
                                        <img src="assets/img/avatar13-sm.jpg" alt="author">
                                        <img src="assets/img/avatar10-sm.jpg" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <a href="#" class="h6 notification-friend">You, Faye, Ed &amp; Jet +3</a>
                                        <span class="last-message-author">Ed:</span>
                                        <span class="chat-message-item">Yeah! Seems fine by me!</span>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="2004-07-24T18:18">March 16th at 10:23am</time></span>
                                    </div>
                                    <span class="notification-icon">
        										<svg class="olymp-chat---messages-icon"><use
                                                    xlink:href="assets/svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
        									</span>
                                    <div class="more">
                                        <svg class="olymp-three-dots-icon">
                                            <use
                                                xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                                        </svg>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <a href="#" class="view-all bg-purple">View All Messages</a>
                    </div>
                </div>

</template>
<script>
	export default {
		name : 'Messages'
	}
</script>