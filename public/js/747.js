(self.webpackChunk=self.webpackChunk||[]).push([[747],{747:(t,e,r)=>{"use strict";r.r(e),r.d(e,{default:()=>s});const a={props:{Id:String},data:function(){return{dialog:!1,formData:{text:"",user_id:localStorage.getItem("user_id")},appURL:"http://127.0.0.1:8001",baseURL:"/",apiToken:localStorage.getItem("user_api_token"),errors:!1}},methods:{postComment:function(){var t=this;axios.post(this.baseURL+"api/events/"+this.Id+"/comments",this.formData,{headers:{Authorization:"Bearer "+this.apiToken}}).then(function(t){this.$emit("refreshComments"),this.formData.text="",this.errors=!1,this.dialog=!1}.bind(this)).catch((function(e){t.errors=!0}))},closeDialog:function(){this.formData.text="",this.errors=!1,this.dialog=!1}}};const s=(0,r(1900).Z)(a,(function(){var t=this,e=t.$createElement,r=t._self._c||e;return r("div",[r("v-dialog",{attrs:{width:"500"},model:{value:t.dialog,callback:function(e){t.dialog=e},expression:"dialog"}},[r("v-card",[r("v-card-title",{staticClass:"title greybg primary--text"},[t._v("\n        New Comment ")]),r("v-card-text",[t.errors?r("div",{staticClass:"error mx-4 mt-4 px-4 white--text py-2 rounded"},[t._v("\n          "+t._s(t.$t("errors.comment.message"))+"\n        ")]):t._e(),t._v(" "),r("v-textarea",{staticClass:"mx-4 mt-4 primary--text",attrs:{outlined:"","no-resize":"",rows:"1","row-height":"15",height:"200"},model:{value:t.formData.text,callback:function(e){t.$set(t.formData,"text","string"==typeof e?e.trim():e)},expression:"formData.text"}})],1),t._v(" "),r("v-divider"),t._v(" "),r("v-card-actions",[r("v-btn",{staticClass:"primary--text",attrs:{text:""},on:{click:function(e){return t.closeDialog()}}},[t._v("cancel")]),t._v(" "),r("v-spacer"),t._v(" "),r("v-btn",{attrs:{color:"info",text:""},on:{click:function(e){return t.postComment()}}},[t._v("submit")])],1)],1)],1)],1)}),[],!1,null,null,null).exports}}]);