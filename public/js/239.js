(self.webpackChunk=self.webpackChunk||[]).push([[239],{4239:(t,n,e)=>{"use strict";e.r(n),e.d(n,{default:()=>c});const l={data:function(){return{}}};var a=e(1900),i=e(3453),s=e.n(i),r=e(7024),u=e(7894),o=(0,a.Z)(l,(function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",[e("v-row",[e("v-col",[e("code",{staticClass:"primary--text"},[t._v("\n        "+t._s(t.$t("page.home.title"))+"\n      ")])])],1)],1)}),[],!1,null,null,null);const c=o.exports;s()(o,{VCol:r.Z,VRow:u.Z})},7894:(t,n,e)=>{"use strict";e.d(n,{Z:()=>h});e(4777);var l=e(538),a=e(7559),i=e(8131);const s=["sm","md","lg","xl"],r=["start","end","center"];function u(t,n){return s.reduce(((e,l)=>(e[t+(0,i.jC)(l)]=n(),e)),{})}const o=t=>[...r,"baseline","stretch"].includes(t),c=u("align",(()=>({type:String,default:null,validator:o}))),d=t=>[...r,"space-between","space-around"].includes(t),f=u("justify",(()=>({type:String,default:null,validator:d}))),g=t=>[...r,"space-between","space-around","stretch"].includes(t),p=u("alignContent",(()=>({type:String,default:null,validator:g}))),y={align:Object.keys(c),justify:Object.keys(f),alignContent:Object.keys(p)},v={align:"align",justify:"justify",alignContent:"align-content"};function C(t,n,e){let l=v[t];if(null!=e){if(n){l+=`-${n.replace(t,"")}`}return l+=`-${e}`,l.toLowerCase()}}const j=new Map,h=l.default.extend({name:"v-row",functional:!0,props:{tag:{type:String,default:"div"},dense:Boolean,noGutters:Boolean,align:{type:String,default:null,validator:o},...c,justify:{type:String,default:null,validator:d},...f,alignContent:{type:String,default:null,validator:g},...p},render(t,{props:n,data:e,children:l}){let i="";for(const t in n)i+=String(n[t]);let s=j.get(i);if(!s){let t;for(t in s=[],y)y[t].forEach((e=>{const l=n[e],a=C(t,e,l);a&&s.push(a)}));s.push({"no-gutters":n.noGutters,"row--dense":n.dense,[`align-${n.align}`]:n.align,[`justify-${n.justify}`]:n.justify,[`align-content-${n.alignContent}`]:n.alignContent}),j.set(i,s)}return t(n.tag,(0,a.ZP)(e,{staticClass:"row",class:s}),l)}})}}]);
//# sourceMappingURL=239.js.map