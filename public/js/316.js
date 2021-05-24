(self.webpackChunk=self.webpackChunk||[]).push([[316],{3316:(t,e,a)=>{"use strict";a.r(e),a.d(e,{default:()=>r});const s={components:{},data:function(){return{overlay:!0,perPage:48,page:1,searchValue:null,query:null,snackbar:!1,venues:"",meta:"",appURL:"http://unitysound.ch/acetate",baseURL:"/",apiToken:"2|QxwrekmrZpsAmSebf4w2g3uvoqQkVyYeVKIHw6vQ"}},mounted:function(){this.fetchVenues()},methods:{fetchVenues:function(){var t=this;this.overlay=!0,this.venues=null,null!=this.searchValue?this.query="venues?per_page="+this.perPage+"&search_field=name&search_value="+this.searchValue:this.query="venues?per_page="+this.perPage+"&page="+this.page,axios.request({url:this.query,method:"get",baseURL:this.baseURL+"api/",headers:{Authorization:"Bearer "+this.apiToken}}).then((function(e){t.venues=e.data.venues,t.meta=e.data.meta,t.overlay=!1})).catch((function(e){t.snackbar=!0,t.searchValue=null,t.fetchVenues()})).finally((function(){}))},onSearch:function(){this.fetchVenues()},onPageChange:function(){this.fetchVenues()},showVenue:function(t){var e="venues/"+t;this.$router.push("".concat(this.baseURL).concat(this.$i18n.locale,"/").concat(e))}}};const r=(0,a(1900).Z)(s,(function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("v-container",{staticClass:"my-0 py-0"},[a("div",{staticClass:"my-0 py-0"},[a("v-snackbar",{scopedSlots:t._u([{key:"action",fn:function(e){var s=e.attrs;return[a("v-btn",t._b({attrs:{centered:"",color:t.$vuetify.theme.dark?"info":"darkinfo",small:"",text:""},on:{click:function(e){t.snackbar=!1}}},"v-btn",s,!1),[t._v("\n                    "+t._s(t.$t("button.close"))+"\n                ")])]}}]),model:{value:t.snackbar,callback:function(e){t.snackbar=e},expression:"snackbar"}},[t._v("\n            "+t._s(t.$t("errors.venues.not_found"))+"\n            ")]),t._v(" "),!1===t.overlay?a("v-container",{staticClass:"my-0 py-0"},[a("div",{staticClass:"my-0 py-0"},[a("div",{staticClass:"my-0 py-0 mx-auto my-auto col-auto"},[a("v-row",{attrs:{justify:"center"}},[a("v-col",{staticClass:"mb-4 my-auto col-auto ",attrs:{cols:"10",sm:"6",md:"4"}},[a("v-text-field",{attrs:{color:t.$vuetify.theme.dark?"primary":"secondary",label:t.$t("search.venues"),"hide-details":"auto",clearable:""},on:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.onSearch(e)}},model:{value:t.searchValue,callback:function(e){t.searchValue=e},expression:"searchValue"}})],1),t._v(" "),a("v-col",{staticClass:"my-auto my-0 mx-0 px-0 py-0 col-auto "},[a("v-btn",{staticClass:"white--text",class:t.$vuetify.theme.dark?"primary":"secondary",attrs:{elevation:"0",fab:"","x-small":""},on:{click:t.onSearch}},[a("v-icon",[t._v("mdi-magnify")])],1)],1)],1)],1),t._v(" "),a("v-row",{attrs:{dense:""}},t._l(t.venues,(function(e,s){return a("v-col",{key:s,attrs:{cols:"12",md:"6"}},[a("v-card",{staticClass:"mx-auto pb-4",attrs:{"max-width":"570px"}},[a("div",[a("v-list-item",{staticClass:"greybg rounded-t",attrs:{"three-line":""}},[a("v-list-item-avatar",{staticClass:"rounded",attrs:{tile:"",size:"80",color:t.$vuetify.theme.dark?"primary darken-1":"greybg darken-1"}},[null!=e.avatar?a("v-img",{attrs:{src:t.baseURL+"storage/avatar/venue/"+e.avatar,title:e.nickname}}):a("v-icon",{attrs:{title:t.$t("avatar.no_avatar"),color:t.$vuetify.theme.dark?"greybg":"primary lighten-1"}},[t._v("mdi-camera-off")])],1),t._v(" "),a("v-list-item-content",[a("div",{staticClass:"overline primary--text"},[a("v-row",[a("v-col",{staticClass:"col-auto ml-auto",staticStyle:{"margin-bottom":"1rem"}},[a("span",{staticClass:"primary--text px-0"},[a("v-icon",{staticClass:"primary--text",attrs:{dark:"",small:""}},[t._v("\n                                                            mdi-star-outline\n                                                        ")])],1)])],1)],1),t._v(" "),a("v-list-item-title",{staticClass:"title primary--text mb-1"},[t._v(t._s(e.name)+"\n                                        ")])],1)],1),t._v(" "),a("v-row",{staticClass:"py-3 mx-2"},[a("v-col",[e.addresses.length>0?a("span",{staticClass:"caption primary--text"},[a("span",[a("v-icon",{staticClass:"mr-1 primary--text",staticStyle:{"margin-bottom":"0.08rem"},attrs:{small:"",title:t.$t("page.venues.title.address")}},[t._v("mdi-map-marker")]),t._v(" "),a("span",[t._v(t._s(e.addresses[0].street1)+",\n                                                    "+t._s(e.addresses[0].zip)+"\n                                                    "+t._s(e.addresses[0].city)+",\n                                                    "+t._s(e.addresses[0].canton)+",\n                                                    "+t._s(e.addresses[0].country))])],1)]):a("span",{staticClass:"caption primary--text"},[a("span",[a("v-icon",{staticClass:"mr-1 ",class:(t.$vuetify.theme.dark,"grey--text"),staticStyle:{"margin-bottom":"0.08rem"},attrs:{small:"",title:t.$t("page.venues.no_addresses_title")}},[t._v("mdi-map-marker")]),a("span",{class:(t.$vuetify.theme.dark,"grey--text"),attrs:{title:t.$t("page.venues.no_addresses_title")}},[t._v("\n                                                    "+t._s(t.$t("page.venues.no_addresses")))])],1)])])],1),t._v(" "),a("v-divider",{staticClass:"mx-2"}),t._v(" "),a("v-row",{staticClass:"pt-3"},[a("v-col",{staticClass:"ml-4 my-auto col-auto"},[a("v-btn",{attrs:{text:"",color:"info accent-4"},on:{click:function(a){return t.showVenue(e.id)}}},[t._v(t._s(t.$t("page.venues.more_info")))])],1),t._v(" "),a("v-col",{staticClass:"mx-4 my-auto col-auto ml-auto"},[a("span",{staticClass:"mr-3",class:t.$vuetify.theme.dark?"primary--text":"secondary--text"},[a("v-icon",{staticClass:"mr-1",class:t.$vuetify.theme.dark?"primary--text":"secondary--text",staticStyle:{"margin-bottom":"0.05rem"},attrs:{dark:"",small:""}},[t._v("\n                                                mdi-comment-outline ")]),a("span",{staticClass:"subtitle-2"},[t._v(t._s(e.comments_count)+"\n                                            ")])],1),t._v(" "),a("span",{class:t.$vuetify.theme.dark?"primary--text":"secondary--text"},[a("v-icon",{staticClass:"mr-1",class:t.$vuetify.theme.dark?"primary--text":"secondary--text",staticStyle:{"margin-bottom":"0.05rem"},attrs:{dark:"",small:""}},[t._v("\n                                                mdi-heart-outline ")]),a("span",{staticClass:"subtitle-2"},[t._v(t._s(e.likes_count))])],1)])],1)],1)])],1)})),1),t._v(" "),1!=t.meta.last_page&&0==t.overlay?a("v-col",{staticClass:"my-0 py-o"},[a("div",{staticClass:"text-center mt-4 mb-0 py-0"},[a("v-container",[a("v-row",{attrs:{justify:"center"}},[a("v-col",{attrs:{cols:"12"}},[a("v-container",{staticClass:"max-width"},[a("v-pagination",{attrs:{color:t.$vuetify.theme.dark?"primary":"secondary",length:t.meta.last_page,circle:""},on:{input:t.onPageChange},model:{value:t.page,callback:function(e){t.page=e},expression:"page"}})],1)],1)],1)],1)],1)]):t._e()],1)]):t._e()],1),t._v(" "),a("v-overlay",{class:t.$vuetify.theme.dark?"primary--text":"secondary--text",attrs:{opacity:.1,value:t.overlay}},[a("v-progress-circular",{attrs:{indeterminate:"",size:"90"}},[a("span",{staticClass:"caption",class:t.$vuetify.theme.dark?"primary--text":"secondary--text"},[t._v(t._s(t.$t("loading")))])])],1)],1)}),[],!1,null,null,null).exports}}]);