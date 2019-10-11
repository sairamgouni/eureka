<template>
  <div>
    <div class="container">
      <div class="row">
        <div class="col col-12">
          <div class="ui-block ui-block-top-contributors">
            <div class="ui-block-title">
              <div class="inline-items">
                <div class="ui-block-title__icon">
                  <img src="assets/img/eureka/contributors/crown.png" />
                </div>
                <div class="h6 title">Top Contributors</div>
              </div>
            </div>

            <div class="ui-block-content block-content-top-contributors">
              <div class="row">
                <div class="col col-12 col-lg-6">
                  <ol class="widget w-contributor-list">
                    <li v-for="(item, index) in list" :key="index" v-if="index <= 4">
                      <div class="contributor-thumb">
                        <img :src="item.image" alt />
                      </div>

                      <div class="contributor-details">
                        <router-link
                          :to="{  name: 'ProfileEuraka',
                                            params: { id: item.id, slug: item.slug } }"
                          class="contributor-name"
                        >{{item.name}}</router-link>
                          <p class="text">{{item.campaign}},  {{item.location}}</p>
                        <div class="contributor-points">{{item.reputation}} points</div>
                      </div>

                      <a
                        href="javascript:void(0);"
                        @click="toggleFollow(item.id)"
                        v-if=" $store.state.userId !== item.id"
                        :class="{ follow: (item.is_following==0) ? true : false, unfollow: (item.is_following==1) ? true : false,  }"
                        class="btn btn-primary btn-sm"
                      >
                        <template v-if="item.is_following==1">Unfollow</template>
                        <template v-if="item.is_following==0">Follow</template>
                      </a>
                    </li>
                  </ol>
                </div>

                <div class="col col-12 col-lg-6">
                  <ol class="widget w-contributor-list right">
                    <li v-for="(item, index) in list" v-if="index > 4 && index+4">
                      <div class="contributor-thumb">
                        <img :src="item.image" alt />
                      </div>

                      <div class="contributor-details">
                        <router-link
                          :to="{  name: 'ProfileEuraka',
                                            params: { id: item.id, slug: item.slug } }"
                          class="contributor-name"
                        >{{item.name}}</router-link>
                          <p class="text">{{item.campaign}},  {{item.location}}</p>

                          <div class="contributor-points">{{item.reputation}} points</div>
                      </div>

                      <a
                        href="javascript:void(0);"
                        @click="toggleFollow(item.id)"
                        v-if=" $store.state.userId !== item.id"
                        :class="{ follow: (item.is_following==0) ? true : false, unfollow: (item.is_following==1) ? true : false,  }"
                        class="btn btn-primary btn-sm"
                      >
                        <template v-if="item.is_following==1">Unfollow</template>
                        <template v-if="item.is_following==0">Follow</template>
                      </a>
                    </li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="container">
          <div class="row">
              <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"  v-for="(item,index) in countryList"
                   :key="index">
                  <div class="ui-block responsive-flex">
                      <div class="ui-block-title">
                          <div class="h6 title">Let's meet all our Quirky Innovators!</div>

                          <div class="align-right">
                              <router-link :to="{name:'Users',params:{country_id:item.country.id}}" class="js-open-popup btn btn-md-2 btn-border-think custom-color c-grey" data-popup-target=".playlist-popup">View All</router-link>
<!--                              <a href="#" class="js-open-popup btn btn-md-2 btn-border-think custom-color c-grey" data-popup-target=".playlist-popup">View Badges</a>-->

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

<!--    <div class="container">-->
<!--      <div class="row">-->
<!--        <div-->
<!--          class="col col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12"-->
<!--          v-for="(item,index) in countryList"-->
<!--          :key="index"-->
<!--        >-->
<!--          <div class="ui-block ui-block-country-contributors">-->
<!--            <div class="ui-block-title">-->
<!--              <h6 class="title">{{item.country.title}}</h6>-->
<!--              <div class="ui-block-title__icon">-->
<!--                <img style="height: 34px; width:34px;" :src="item.country.icon" />-->
<!--              </div>-->
<!--            </div>-->
<!--            <ol class="widget w-contributor-list">-->
<!--              <li v-for="userItem in item.toppers">-->
<!--                <div class="contributor-thumb">-->
<!--                  <img :src="userItem.image" alt />-->
<!--                </div>-->

<!--                <div class="contributor-details">-->
<!--                  <router-link-->
<!--                    :to="{  name: 'ProfileEuraka',-->
<!--                            params: { id: userItem.id, slug: userItem.slug } }"-->
<!--                    class="contributor-name"-->
<!--                  >{{userItem.name}}</router-link>-->
<!--                  <a href="javascript:void(0);" class="contributor-location">{{userItem.location}}</a>-->
<!--                </div>-->

<!--                <div class="contributor-points">-->
<!--                  <span>{{userItem.reputation}} Points</span>-->
<!--                  &lt;!&ndash;   <div class="more"><svg class="olymp-three-dots-icon"><use xlink:href="assets/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>-->
<!--                                          <ul class="more-dropdown">-->
<!--                                              <li>-->
<!--                                                  <a href="#">Follow</a>-->
<!--                                              </li>-->
<!--                                          </ul>-->
<!--                  </div>&ndash;&gt;-->
<!--                </div>-->
<!--              </li>-->
<!--            </ol>-->
<!--              <div class="ui-block-footer">-->
<!--                  &lt;!&ndash;                            <a href="javascript:void(0)"></a>&ndash;&gt;-->
<!--                  <router-link :to="{name:'Users',params:{country_id:item.country.id}}">Show All</router-link>-->
<!--              </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
  </div>
</template>
<script>
export default {
  name: "ContributorsList",
  data() {
    return {
      topContributors: [],
      countryToppers: [],
      userLogin: false,
      list: [],
      countryList: []
    };
  },
  methods: {
    getTopContributors() {
      let loader = this.$loading.show({
        container: this.fullPage ? null : this.$refs.file
      });
      this.axios({
        method: "get",
        url: "user/top-contributors"
      })
        .then(response => {
          loader.hide();
          this.topContributors = response.data.top_contributors;
          this.list = this.topContributors;
          this.countryList = response.data.country_contributors;
        })
        .catch(function(response) {
          console.log("in exception");
          loader.hide();
        });
    },
    toggleFollow(itemId) {
      // console.log('index '+index);
      if (!this.userLogin) {
        this.$toast.open({
          message: "Please login to like",
          type: "info"
        });
        return;
      }
      var bodyFormData = new FormData();
      bodyFormData.set("item_id", itemId);
      this.axios({
        method: "post",
        url: "friends/toggle-follow",
        data: bodyFormData
      })
        .then(response => {
          // loader.hide();
          let like_value = response.data;

          console.log("liked: " + itemId);
          for (let index = 0; index < this.list.length; index++) {
            console.log("in loop with index: " + this.list[index].id);
            if (this.list[index].id == itemId) {
              if (like_value == 1) {
                this.list[index].is_following = 1;
                // this.$toast.open({
                //   message: "Following Updated",
                //   type: "success"
                // });
                break;
              } else {
                if (this.list[index].is_following == 1) {
                  this.list[index].is_following = 0;
                  // this.$toast.open({
                  //   message: "Unfollowing Updated",
                  //   type: "success"
                  // });
                }
              }
            }
          }
        })
        .catch(function(response) {
          console.log("in response methods");
          console.log(response);
          // loader.hide();
        });
    },

    doMath: function(index) {
      return index + 1;
    }
  },
  created() {
    this.userLogin = this.$store.getters.getLogin;

    this.getTopContributors();
  },
  mounted() {
    $("ol.expandible").each(function() {
      var $ul = $(this),
        $lis = $ul.find("li:gt(5)"),
        isExpanded = $ul.hasClass("expanded");
      $lis[isExpanded ? "show" : "hide"]();

      if ($lis.length > 0) {
        $ul.append(
          $(
            '<span class="showmore"><li class="expand">' +
              (isExpanded ? "Show Less" : "Show More") +
              "</li></span>"
          ).click(function(event) {
            var isExpanded = $ul.hasClass("expanded");
            event.preventDefault();
            $(this).html(isExpanded ? "Show More" : "Show Less");
            $ul.toggleClass("expanded");
            $lis.toggle();
          })
        );
      }
    });
  }
};
</script>
