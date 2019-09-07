<template>
	                <div class="control-icon more has-items">
                    <svg class="olymp-thunder-icon">
                        <use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-thunder-icon"></use>
                    </svg>

                    <div class="label-avatar bg-primary" v-if="notifications.length>0">{{notifications.length}}</div>

                    <div class="more-dropdown more-with-triangle triangle-top-center">
                        <!-- <div class="ui-block-title ui-block-title-small">
                            <h6 class="title">Notifications</h6>
                            <a href="#">Mark all as read</a>
                            <a href="#">Settings</a>
                        </div> -->

                        <div class="mCustomScrollbar" data-mcs-theme="dark">
                            <ul class="notification-list">
                                <li v-for="(item, index) in notifications">
                                    <div class="author-thumb">
                                        <img :src="item.notifier_image" style="height:34px; width:34px;" alt="author">
                                    </div>
                                    <div class="notification-event">
                                        <div>
                                        <router-link  
                                        :to="{ name: 'ProfileEuraka', params: { id: item.id, slug: item.notifier_slug } }"
                                         class="h6 notification-friend">

                                            
                                            {{item.notifier_name}}
                                            </router-link>
                                            
                                            {{item.message}}
                                             
                                             <router-link :to="{ name: 'ChallengeDetails', params: { id: item.item_id, slug: item.item_slug } }" class="notification-link">

                                             
                                                {{item.item_title}}
                                             </router-link>
                                        </div>
                                        <span class="notification-date"><time class="entry-date updated"
                                                                              datetime="2004-07-24T18:18">{{item.created_at}}</time></span>
                                    </div>
                                  
 
                                </li>

 
                            </ul>
                        </div>

                        <router-link to="/notifications" class="view-all bg-primary">
                        View All Notifications
                    	</router-link>
                    </div>
                </div>
</template>

<script>
	export default {
		name: 'Notifications',
        props:['notifications']
	}
</script>