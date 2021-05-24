(self.webpackChunk=self.webpackChunk||[]).push([[761],{761:(e,t,n)=>{"use strict";n.r(t),n.d(t,{default:()=>a});const i={props:{id:String},components:{},data:function(){return{overlay:!0,avatarDialog:!1,venue:null,appURL:"http://unitysound.ch/acetate",baseURL:"/",apiToken:"2|QxwrekmrZpsAmSebf4w2g3uvoqQkVyYeVKIHw6vQ",renderComponent:!1,renderCardTitle:!1,renderToolbox:!1,adminButtons:[{name:"edit",title:"menu.edit_venues.title",path:"admin/venues/edit",icon:"mdi-calendar-range"},{name:"delete",title:"menu.delete_venues.title",path:"admin/venues/delete",icon:"mdi-calendar-remove"}],toggle_none:null}},methods:{logged:function(){return localStorage.getItem("user_api_token")},author:function(){if(this.venue.user_id==localStorage.getItem("user_id"))return!0},admin:function(){if("super-admin"===localStorage.getItem("user_role"))return!0},editable:function(){if(this.logged()&&(this.author()||this.admin()))return!0},editThis:function(e){this.$router.push("".concat(this.baseURL).concat(this.$i18n.locale,"/admin/venues/edit/").concat(e))},deleteThis:function(e){this.$router.push("".concat(this.baseURL).concat(this.$i18n.locale,"/admin/venues/delete/").concat(e))},logThis:function(e){console.log(this.appURL+this.baseURL+e.path)},gotoVenues:function(){this.$router.push("".concat(this.baseURL).concat(this.$i18n.locale,"/venues"))},fetchAPI:function(){var e=this;axios.request({url:this.id,method:"get",baseURL:this.baseURL+"api/venues/",headers:{Authorization:"Bearer "+this.apiToken}}).then((function(t){e.venue=t.data.data.venue})).catch((function(t){e.$router.push("".concat(e.baseURL).concat(e.$i18n.locale,"/").concat("error/404"))})).finally((function(){return e.overlay=!1,e.renderToolbox=!0,e.renderCardTitle=!0,e.renderComponent=!0,e.venue}))},forceRerender:function(){var e=this;this.renderComponent=!1,this.$nextTick((function(){e.fetchAPI()}))},rerenderCardTitle:function(){var e=this;this.renderCardTitle=!1,this.$nextTick((function(){e.fetchAPI()}))},rerenderToolbox:function(){var e=this;this.renderToolbox=!1,this.$nextTick((function(){e.fetchAPI()}))}},mounted:function(){this.fetchAPI()}};const a=(0,n(1900).Z)(i,(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("v-container",[null!==e.venue?n("div",{staticClass:"d-flex justify-center mb-4"},[e.renderToolbox?n("v-btn-toggle",{staticClass:"greybg"},[n("span",[n("v-btn",{attrs:{text:"",tile:"",outlined:"",small:"",color:"secondary"},on:{click:function(t){return e.gotoVenues()}}},[e._v(e._s(e.$t("button.back.venues")))])],1),e._v(" "),e.editable()?n("span",[n("v-btn",{attrs:{text:"",tile:"",outlined:"",small:"",color:"info"},on:{click:function(t){e.$refs.AvatarDialog.avatarDialog=!0}}},[e._v(e._s(e.$t("admin.edit_avatar.title")))]),n("v-btn",{attrs:{text:"",tile:"",outlined:"",small:"",color:"info"},on:{click:function(t){return e.editThis(e.venue.id)}}},[e._v(e._s(e.$t("admin.edit.title")))]),n("v-btn",{attrs:{text:"",tile:"",outlined:"",small:"",color:"info"},on:{click:function(t){return e.deleteThis(e.venue.id)}}},[e._v(e._s(e.$t("admin.delete.title")))])],1):e._e()]):e._e()],1):e._e(),e._v(" "),n("div",[!1===e.overlay?n("v-card",{staticClass:"pb-4 mx-auto",attrs:{"max-width":"800px"}},[n("div",{staticClass:"mx-4 py-4"},[e._v(e._s(e.id))]),e._v(" "),e.venue.files?n("div",[null!==e.venue.files&&e.venue.files.length>0?n("div",[n("v-carousel",{attrs:{cycle:"",interval:"5000","hide-delimiters":"","show-arrows-on-hover":""}},e._l(e.venue.files,(function(t,i){return n("v-carousel-item",{key:i,attrs:{src:e.baseURL+"storage/file/"+t.path,title:t.name}})})),1)],1):e._e()]):n("div",{staticClass:"d-flex justify-center"},[n("v-progress-linear",{attrs:{indeterminate:"",color:(e.$vuetify.theme.dark,"info"),opacity:"0.1"}})],1)]):e._e()],1),e._v(" "),n("v-overlay",{class:e.$vuetify.theme.dark?"primary--text":"secondary--text",attrs:{opacity:"0.1",value:e.overlay}},[n("v-progress-circular",{attrs:{indeterminate:"",size:"90"}},[n("span",{staticClass:"caption",class:e.$vuetify.theme.dark?"primary--text":"secondary--text"},[e._v(e._s(e.$t("loading")))])])],1)],1)}),[],!1,null,null,null).exports}}]);