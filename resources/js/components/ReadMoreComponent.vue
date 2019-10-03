<template>
	<div>
		<p>
            {{formattedString}}
          <span v-show="text.length > maxChars">
			<a :href="link" id="readmore" v-show="!isReadMore" v-on:click="triggerReadMore($event, true)" class="show" style="color:#094472">{{moreStr}}</a>
			<a :href="link" id="readmore" v-show="isReadMore" v-on:click="triggerReadMore($event, false)" class="show"style="color:#094472">{{lessStr}}</a>
		</span>
        </p>

	</div>
</template>

<script>
	export default{
		props: {
			moreStr: {
				type: String,
				default: 'read more'
			},
			lessStr: {
				type: String,
				default: ''
			},
			text: {
				type: String,
				required: true
			},
			link: {
				type: String,
				default: '#'
			},
			maxChars: {
				type: Number,
				default: 100
			}
		},

		data (){
			return{
				isReadMore: false
			}
		},

		computed: {
			formattedString(){
				var val_container = this.text;

				if(!this.isReadMore && this.text.length > this.maxChars){
					val_container = val_container.substring(0,this.maxChars) + '...';
				}

				return(val_container);
			}
		},

		methods: {
			triggerReadMore(e, b){
				if(this.link == '#'){
					e.preventDefault();
				}
				if(this.lessStr !== null || this.lessStr !== '')
					this.isReadMore = b;
			}
		}
	}
</script>
<style>
    .show{
        color: #094472;
    }
</style>
