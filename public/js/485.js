(self.webpackChunk=self.webpackChunk||[]).push([[485],{4485:(t,e,n)=>{"use strict";n.r(e),n.d(e,{default:()=>a});const i={props:{Id:String,Name:String,Description:String,Step:Number},data:function(){return{}},methods:{nextStep:function(){var t=document.getElementById("name").value,e=document.getElementById("description").value;console.log("name: ",t),console.log("description: ",e),this.$emit("Step2")},historyBack:function(){this.$router.push("/".concat(this.$i18n.locale,"/events/").concat(this.Id))}},mounted:function(){}};const a=(0,n(1900).Z)(i,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",[n("v-stepper-content",{attrs:{step:t.Step}},[n("v-card",{staticClass:"m-0 mt-4 p-0 primary--text"},[n("v-divider"),t._v(" "),n("v-card-text",{staticClass:"m-0 p-0"},[n("v-text-field",{staticClass:"primary--text p-0 m-0",attrs:{type:"text",id:"name",value:t.Name,clearable:"",required:"",counter:"100",label:t.$t("admin.event.title")}}),t._v(" "),n("v-textarea",{staticClass:"mt-4 m-0 m-0 primary--text",attrs:{id:"description",value:t.Description,height:"400",clearable:"","no-resize":"",outlined:"",rows:"1",label:t.$t("admin.event.description"),"row-height":"25"}})],1),n("v-divider"),t._v(" "),n("v-card-actions",{staticClass:"mx-1 mt-4 p-0"},[n("v-btn",{staticClass:"primary--text",attrs:{outlined:""},on:{click:function(e){return t.historyBack()}}},[t._v("\n                    "+t._s(t.$t("button.cancel"))+" ")]),n("v-spacer"),n("v-btn",{attrs:{color:"info",outlined:""},on:{click:function(e){return t.nextStep()}}},[t._v("\n                    "+t._s(t.$t("button.next"))+"\n                ")])],1)],1)],1)],1)}),[],!1,null,null,null).exports}}]);