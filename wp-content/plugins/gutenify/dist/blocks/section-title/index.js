(()=>{var e,t={9294:(e,t,l)=>{"use strict";const n=window.wp.element,i=window.wp.i18n,a=window.wp.components,r=window.wp.blocks;var c=l(4184),o=l.n(c);const s=window.wp.blockEditor,m=e=>{const{children:t,name:l,className:i}=e,a=l.replace("/","-")+"-section",r=o()(a,i);return(0,n.createElement)("div",{className:r},t)},h=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"gutenify/section-title","category":"gutenify","title":"Section Title","version":"2","attributes":{"blockClientId":{"type":"string","default":""},"blockAdvanceOptions":{"type":"object","default":{}},"isSaved":{"type":"boolean","default":false},"textAlignment":{"type":"string","default":"center"},"prefixContent":{"type":"string","default":""},"prefixColor":{"type":"string","default":""},"prefixFontSize":{"type":"string","default":""},"displayPrefix":{"type":"boolean","default":true},"titleContent":{"type":"string","default":""},"titleColor":{"type":"string","default":""},"titleFontSize":{"type":"string","default":""},"suffixContent":{"type":"string","default":""},"suffixColor":{"type":"string","default":""},"suffixFontSize":{"type":"string","default":""},"displaySuffix":{"type":"boolean","default":true},"prefixTag":{"type":"string","default":"p"},"titleTag":{"type":"string","default":"h2"},"suffixTag":{"type":"string","default":"p"}},"editorScript":["gutenify--section-title"],"editorStyle":["gutenify--section-title--editor"],"style":["gutenify--section-title--frontend"]}'),f=window.wp.hooks,{name:g}=h,v={name:g,blockId:g.replace("/","--"),hookPrefix:"section-title"},u={pluginMainSlug:"gutenify",pluginMainCamelCaseName:"gutenify",pluginMainFunctionPrefix:"gutenify"},{blockId:d}=v,{pluginMainSlug:p}=u;(0,f.addFilter)(`${p}--block-controls--${d}`,`${p}--block-controls--${d}--edit-button`,((e,t)=>{const{attributes:l,setAttributes:i}=t,{textAlignment:a}=l;return[...e,(0,n.createElement)(n.Fragment,{key:`gutenify-block-${d}-options-tab-content-basic`},(0,n.createElement)(s.AlignmentToolbar,{value:a,onChange:e=>{i({textAlignment:e})}}))]}));const w=e=>{let{tabs:t=[]}=e;const[{currentTab:l},i]=(0,n.useState)({currentTab:!1});return(0,n.createElement)("div",{className:"gutenify-accordion-wrapper"},t.map((e=>{const t=e.label,r=l===e.name;let c="gutenify-accordion-item";return c+=r?" gutenify-accordion-item-active":"",(0,n.createElement)("div",{className:c,key:`gutenify-accordion-item-${e.name}`},(0,n.createElement)("button",{onClick:()=>{i({currentTab:l===e.name?"":e.name})},className:"gutenify-accordion-item-heading"},(0,n.createElement)("div",{className:"gutenify-accordion-item-heading-arrow"},(0,n.createElement)(a.Icon,{icon:r?"arrow-down-alt2":"arrow-right-alt2"})),(0,n.createElement)("div",{className:"gutenify-accordion-item-label"},(0,n.createElement)(t,null))),(0,n.createElement)("div",{className:"gutenify-accordion-item-content"}," ",e.cb()))})))},{blockId:x,hookPrefix:E}=v,{pluginMainSlug:C}=u,b=[{label:"Heading 1",value:"h1"},{label:"Heading 2",value:"h2"},{label:"Heading 3",value:"h3"},{label:"Heading 4",value:"h4"},{label:"Heading 5",value:"h5"},{label:"Heading 6",value:"h6"},{label:"DIV",value:"div"},{label:"P",value:"p"}];(0,f.addFilter)(`${C}--inspector-controls--${x}--content`,`${C}--inspector-controls--${x}--content--opitons`,((e,t)=>{const{attributes:l,setAttributes:r}=t,{displayPrefix:c,displaySuffix:o,prefixFontSize:m,prefixTag:h,titleTag:f,titleFontSize:g,suffixTag:v,suffixFontSize:u}=l;return[...e,(0,n.createElement)(n.Fragment,{key:`gutenify-block-${E}-options-tab-content-basic`},(0,n.createElement)(w,{tabs:[{name:"prefix-title",initialOpen:!0,label:()=>(0,i.__)("Prefix Title"),cb:()=>(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.ToggleControl,{label:(0,i.__)("Display prefix","gutenify"),checked:c,help:c?(0,i.__)("Showing the prefix.","gutenify"):(0,i.__)("Toggle to show the prefix.","gutenify"),onChange:()=>r({displayPrefix:!c})}),c&&(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.SelectControl,{label:(0,i.__)("Prefix Title Tag"),value:h,options:b,onChange:e=>r({prefixTag:e})}),(0,n.createElement)(s.FontSizePicker,{onChange:e=>{r({prefixFontSize:e})},value:m,withReset:!0})))},{name:"title",initialOpen:!0,label:()=>(0,i.__)("Main Title"),cb:()=>(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.SelectControl,{label:(0,i.__)("Title Tag"),value:f,options:b,onChange:e=>r({titleTag:e})}),(0,n.createElement)(s.FontSizePicker,{onChange:e=>{r({titleFontSize:e})},value:g,withReset:!0}))},{name:"suffix-title",initialOpen:!0,label:()=>(0,i.__)("Suffix Title"),cb:()=>(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.ToggleControl,{label:(0,i.__)("Display suffix","gutenify"),checked:o,help:o?(0,i.__)("Showing the suffix.","gutenify"):(0,i.__)("Toggle to show the suffix.","gutenify"),onChange:()=>r({displaySuffix:!o})}),o&&(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.SelectControl,{label:(0,i.__)("Suffix Title Tag"),value:v,options:b,onChange:e=>r({suffixTag:e})}),(0,n.createElement)(s.FontSizePicker,{onChange:e=>{r({suffixFontSize:e})},value:u,withReset:!0})))}]}))]}));const z=window.wp.data,y=(window.lodash,e=>{const{clearable:t=!0}=e,{colors:l}=(0,z.useSelect)((e=>({colors:e("core/block-editor").getSettings().colors||[]})));return(0,n.createElement)(a.BaseControl,{label:e.label,id:"textcolor-1"},(0,n.createElement)(a.ColorPalette,{colors:l,value:e.value,onChange:t=>{e.onChange(t)},clearable:t}))}),{blockId:S}=v,{pluginMainSlug:_}=u;(0,f.addFilter)(`${_}--inspector-controls--${S}--style`,`${_}--inspector-controls--${S}--style--opitons`,((e,t)=>{const{attributes:l,setAttributes:a}=t,{prefixColor:r,titleColor:c,suffixColor:o}=l;return[...e,(0,n.createElement)(n.Fragment,{key:`gutenify-block-${S}-options-tab-content-basic`},(0,n.createElement)(w,{tabs:[{name:"colors",initialOpen:!0,label:()=>(0,i.__)("Colors"),cb:()=>(0,n.createElement)(n.Fragment,null,(0,n.createElement)(y,{label:(0,i.__)("Prefix Color"),onChange:e=>{a({prefixColor:e})},value:r}),(0,n.createElement)(y,{label:(0,i.__)("Prefix Color"),onChange:e=>{a({titleColor:e})},value:c}),(0,n.createElement)(y,{label:(0,i.__)("Suffix Color"),onChange:e=>{a({suffixColor:e})},value:o}))}]}))]}));const{blockId:T}=v,{pluginMainSlug:k}=u;(0,f.addFilter)(`${k}--inspector-controls--${T}--advance`,`${k}--inspector-controls--${T}--advance--opitons`,((e,t)=>{const{setAttributes:l,attributes:r}=t,{blockAdvanceOptions:c}=r;return[...e,(0,n.createElement)(n.Fragment,{key:`${k}--inspector-controls--${T}--advance--opitons`},(0,n.createElement)(w,{tabs:[{name:"additional-css-classes",initialOpen:!0,label:()=>(0,i.__)("Additional CSS Classes"),cb:()=>(0,n.createElement)(n.Fragment,null,(0,n.createElement)(a.TextControl,{label:(0,i.__)("Prefix Title Classes"),value:null==c?void 0:c.prefixTitleClasses,onChange:e=>{const t={blockAdvanceOptions:{...c,prefixTitleClasses:e}};l(t)}}),(0,n.createElement)(a.TextControl,{label:(0,i.__)("Main Title Classes"),value:null==c?void 0:c.mainTitleClasses,onChange:e=>{const t={blockAdvanceOptions:{...c,mainTitleClasses:e}};l(t)}}),(0,n.createElement)(a.TextControl,{label:(0,i.__)("Suffix Title Classes"),value:null==c?void 0:c.suffixTitleClasses,onChange:e=>{const t={blockAdvanceOptions:{...c,suffixTitleClasses:e}};l(t)}}))}]}))]}));const{blockId:H,name:M,hookPrefix:V}=v,{pluginMainSlug:P}=u;(0,f.addFilter)(`${P}--inline-styles--${H}`,`${P}--inline-styles--${H}--button`,(function(e,t){let l=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"";const{attributes:n,name:i}=t;if(i!==M)return e;const{prefixFontSize:a,titleFontSize:r,suffixFontSize:c,blockClientId:o}=n;return l=l||`.gutenify-section-${o}`,a&&(e+=`${l} .gutenify-section-title-prefix{\n\t\t\t${a?`font-size: ${a}`:""};\n\t\t}`),r&&(e+=`${l} .gutenify-section-title-main{\n\t\t${r?`font-size: ${r}`:""};\n\t}`),c&&(e+=`${l} .gutenify-section-title-suffix{\n\t\t${c?`font-size: ${c}`:""};\n\t}`),(0,f.applyFilters)(`gutenify--${V}--inline-styles`,e,t)}));const $=window.wp.primitives;var F,G;const L=null!==(F=window)&&void 0!==F&&null!==(G=F.gutenify_components_vars)&&void 0!==G&&G.brand_color?window.gutenify_components_vars.brand_color:"#2196f3",O=((0,n.createElement)($.SVG,{fill:"none","view-box":"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M17 3H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5V5c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5V6.2h-5v1.6zM17 13H7c-1.1 0-2 .9-2 2v4c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2v-4c0-1.1-.9-2-2-2zm.5 6c0 .3-.2.5-.5.5H7c-.3 0-.5-.2-.5-.5v-4c0-.3.2-.5.5-.5h10c.3 0 .5.2.5.5v4zm-8-1.2h5v-1.5h-5v1.5z"}))),(0,n.createElement)($.SVG,{fill:"none","view-box":"0 0 24 24",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M19 6.5H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-7c0-1.1-.9-2-2-2zm.5 9c0 .3-.2.5-.5.5H5c-.3 0-.5-.2-.5-.5v-7c0-.3.2-.5.5-.5h14c.3 0 .5.2.5.5v7zM8 12.8h8v-1.5H8v1.5z"}))),(0,n.createElement)($.SVG,{width:"24",height:"24",fill:"none",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",role:"img","aria-hidden":"true",focusable:"false"},(0,n.createElement)($.Rect,{height:"14.5",rx:".875",stroke:L,strokeWidth:"1.5",width:"14.5",x:"4.75",y:"4.75",fill:"none"}),(0,n.createElement)($.Path,{d:"m5.06667 14.6666 3.9619-2.1334 2.97143 1.4222 3.4667-2.4888 3.4666 2.4888",stroke:L,strokeLinejoin:"round",strokeWidth:"1.5",fill:"none"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"m23 18c-.8284 0-1.5-.6716-1.5-1.5v-9c0-.82843.6716-1.5 1.5-1.5z"}),(0,n.createElement)($.Path,{d:"m1 6c.82843 0 1.5.67157 1.5 1.5v9c0 .8284-.67157 1.5-1.500001 1.5z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M15.8 4.2c3.2 3.21 3.2 8.39 0 11.6-3.21 3.2-8.39 3.2-11.6 0C1 12.59 1 7.41 4.2 4.2 7.41 1 12.59 1 15.8 4.2zm-4.3 11.3v-4h4v-3h-4v-4h-3v4h-4v3h4v4h3z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M19 16V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v13c0 .55.45 1 1 1h15c.55 0 1-.45 1-1zM4 4h13v4H4V4zm1 1v2h3V5H5zm4 0v2h3V5H9zm4 0v2h3V5h-3zm-8.5 5c.28 0 .5.22.5.5s-.22.5-.5.5-.5-.22-.5-.5.22-.5.5-.5zM6 10h4v1H6v-1zm6 0h5v5h-5v-5zm-7.5 2c.28 0 .5.22.5.5s-.22.5-.5.5-.5-.22-.5-.5.22-.5.5-.5zM6 12h4v1H6v-1zm7 0v2h3v-2h-3zm-8.5 2c.28 0 .5.22.5.5s-.22.5-.5.5-.5-.22-.5-.5.22-.5.5-.5zM6 14h4v1H6v-1z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M13 13.14l1.17-5.94c.79-.43 1.33-1.25 1.33-2.2 0-1.38-1.12-2.5-2.5-2.5S10.5 3.62 10.5 5c0 .95.54 1.77 1.33 2.2zm0-9.64c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm1.72 4.8L18 6.97v9L13.12 18 7 15.97l-5 2v-9l5-2 4.27 1.41 1.73 7.3z"}))),(0,n.createElement)($.SVG,{width:"24",height:"24",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",role:"img","aria-hidden":"true",focusable:"false"},(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M16.4 4.2H7.6v1.5h8.9V4.2zM4 11.2v1.5h16v-1.5H4zm3.6 8.6h8.9v-1.5H7.6v1.5z"})))),{name:A,attributes:B}=((0,n.createElement)($.SVG,{width:"24",height:"24",fill:"none",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",role:"img","aria-hidden":"true",focusable:"false"},(0,n.createElement)($.Path,{d:"m6 4.75h12c.6904 0 1.25.55964 1.25 1.25v12c0 .6904-.5596 1.25-1.25 1.25h-12c-.69036 0-1.25-.5596-1.25-1.25v-12c0-.69036.55964-1.25 1.25-1.25z",stroke:L,strokeWidth:"1.5",fill:"none"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"m7 9h2v2h-2z"}),(0,n.createElement)($.Path,{d:"m7 13h2v2h-2z"}),(0,n.createElement)($.Path,{d:"m10 9h7v2h-7z"}),(0,n.createElement)($.Path,{d:"m10 13h7v2h-7z"}),(0,n.createElement)($.Path,{d:"m23 18c-.8284 0-1.5-.6716-1.5-1.5v-9c0-.82843.6716-1.5 1.5-1.5z"}),(0,n.createElement)($.Path,{d:"m1 6c.82843 0 1.5.67157 1.5 1.5v9c0 .8284-.67157 1.5-1.500001 1.5z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M10 1l3 6 6 .75-4.12 4.62L16 19l-6-3-6 3 1.13-6.63L1 7.75 7 7z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M8.03 4.46c-.29 1.28.55 3.46 1.97 3.46 1.41 0 2.25-2.18 1.96-3.46-.22-.98-1.08-1.63-1.96-1.63-.89 0-1.74.65-1.97 1.63zm-4.13.9c-.25 1.08.47 2.93 1.67 2.93s1.92-1.85 1.67-2.93c-.19-.83-.92-1.39-1.67-1.39s-1.48.56-1.67 1.39zm8.86 0c-.25 1.08.47 2.93 1.66 2.93 1.2 0 1.92-1.85 1.67-2.93-.19-.83-.92-1.39-1.67-1.39-.74 0-1.47.56-1.66 1.39zm-.59 11.43l1.25-4.3C14.2 10 12.71 8.47 10 8.47c-2.72 0-4.21 1.53-3.44 4.02l1.26 4.3C8.05 17.51 9 18 10 18c.98 0 1.94-.49 2.17-1.21zm-6.1-7.63c-.49.67-.96 1.83-.42 3.59l1.12 3.79c-.34.2-.77.31-1.2.31-.85 0-1.65-.41-1.85-1.03l-1.07-3.65c-.65-2.11.61-3.4 2.92-3.4.27 0 .54.02.79.06-.1.1-.2.22-.29.33zm8.35-.39c2.31 0 3.58 1.29 2.92 3.4l-1.07 3.65c-.2.62-1 1.03-1.85 1.03-.43 0-.86-.11-1.2-.31l1.11-3.77c.55-1.78.08-2.94-.42-3.61-.08-.11-.18-.23-.28-.33.25-.04.51-.06.79-.06z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M10 9.25c-2.27 0-2.73-3.44-2.73-3.44C7 4.02 7.82 2 9.97 2c2.16 0 2.98 2.02 2.71 3.81 0 0-.41 3.44-2.68 3.44zm0 2.57L12.72 10c2.39 0 4.52 2.33 4.52 4.53v2.49s-3.65 1.13-7.24 1.13c-3.65 0-7.24-1.13-7.24-1.13v-2.49c0-2.25 1.94-4.48 4.47-4.48z"}))),(0,n.createElement)($.SVG,{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)($.Rect,{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)($.G,{fill:L},(0,n.createElement)($.Path,{d:"M10 1c7 0 9 2.91 9 6.5S17 14 10 14s-9-2.91-9-6.5S3 1 10 1zM5.5 9C6.33 9 7 8.33 7 7.5S6.33 6 5.5 6 4 6.67 4 7.5 4.67 9 5.5 9zM10 9c.83 0 1.5-.67 1.5-1.5S10.83 6 10 6s-1.5.67-1.5 1.5S9.17 9 10 9zm4.5 0c.83 0 1.5-.67 1.5-1.5S15.33 6 14.5 6 13 6.67 13 7.5 13.67 9 14.5 9zM6 14.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5-1.5-.67-1.5-1.5.67-1.5 1.5-1.5zm-3 2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"}))),(0,n.createElement)($.SVG,{width:"27",height:"13",viewBox:"0 0 27 13",fill:"none",xmlns:"http://www.w3.org/2000/svg"},(0,n.createElement)($.Rect,{width:"27",height:"13",rx:"6.5",fill:"#05A015"}),(0,n.createElement)($.Path,{d:"M6.57812 6.99609L6.22656 9H5.08203L6.07031 3.3125L8.0625 3.31641C8.67708 3.31641 9.16016 3.48698 9.51172 3.82812C9.86328 4.16927 10.0169 4.61458 9.97266 5.16406C9.93099 5.72135 9.69792 6.16667 9.27344 6.5C8.85156 6.83333 8.3125 7 7.65625 7L6.57812 6.99609ZM6.73828 6.04688L7.69141 6.05469C7.9987 6.05469 8.25391 5.97526 8.45703 5.81641C8.66016 5.65755 8.78125 5.44271 8.82031 5.17188C8.85938 4.90104 8.8151 4.6849 8.6875 4.52344C8.5625 4.36198 8.3763 4.27604 8.12891 4.26562L7.05078 4.26172L6.73828 6.04688ZM12.5664 6.91797H11.6367L11.2734 9H10.1289L11.1172 3.3125L13 3.31641C13.6302 3.31641 14.1146 3.46484 14.4531 3.76172C14.7943 4.05859 14.9453 4.47135 14.9062 5C14.8516 5.78125 14.4349 6.32422 13.6562 6.62891L14.457 8.9375V9H13.2383L12.5664 6.91797ZM11.8008 5.96875L12.6523 5.97656C12.9544 5.97135 13.2031 5.89062 13.3984 5.73438C13.5964 5.57552 13.7148 5.36068 13.7539 5.08984C13.7904 4.83724 13.75 4.63932 13.6328 4.49609C13.5156 4.35286 13.3294 4.27604 13.0742 4.26562L12.0977 4.26172L11.8008 5.96875ZM17.4062 9.07812C17.0286 9.07031 16.6953 8.98177 16.4062 8.8125C16.1198 8.64062 15.8919 8.39453 15.7227 8.07422C15.556 7.7513 15.4596 7.38151 15.4336 6.96484C15.4049 6.53776 15.4505 6.08203 15.5703 5.59766C15.6901 5.11328 15.8828 4.6875 16.1484 4.32031C16.4141 3.95312 16.7253 3.67839 17.082 3.49609C17.4414 3.3138 17.8294 3.22656 18.2461 3.23438C18.6289 3.24219 18.9635 3.33333 19.25 3.50781C19.5365 3.67969 19.7617 3.92839 19.9258 4.25391C20.0898 4.57682 20.1836 4.94401 20.207 5.35547C20.2331 5.8138 20.1836 6.28516 20.0586 6.76953C19.9336 7.25391 19.7396 7.67318 19.4766 8.02734C19.2135 8.38151 18.9049 8.64714 18.5508 8.82422C18.1992 9.0013 17.8177 9.08594 17.4062 9.07812ZM19.0273 6L19.0586 5.62891C19.0846 5.16536 19.0221 4.8138 18.8711 4.57422C18.7227 4.33464 18.4961 4.20964 18.1914 4.19922C17.7148 4.18359 17.3359 4.39453 17.0547 4.83203C16.776 5.26953 16.6185 5.88151 16.582 6.66797C16.556 7.12891 16.6172 7.48438 16.7656 7.73438C16.9141 7.98177 17.1445 8.11068 17.457 8.12109C17.8659 8.13932 18.2044 7.98047 18.4727 7.64453C18.7409 7.30599 18.9167 6.82812 19 6.21094L19.0273 6Z",fill:"white"})),(0,n.createElement)("svg",{width:"24",height:"24",viewBox:"0 0 24 24",xmlns:"http://www.w3.org/2000/svg",role:"img","aria-hidden":"true",focusable:"false"},(0,n.createElement)("path",{d:"M18 4h-7c-1.1 0-2 .9-2 2v3H6c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h7c1.1 0 2-.9 2-2v-3h3c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm-4.5 14c0 .3-.2.5-.5.5H6c-.3 0-.5-.2-.5-.5v-7c0-.3.2-.5.5-.5h3V13c0 1.1.9 2 2 2h2.5v3zm0-4.5H11c-.3 0-.5-.2-.5-.5v-2.5H13c.3 0 .5.2.5.5v2.5zm5-.5c0 .3-.2.5-.5.5h-3V11c0-1.1-.9-2-2-2h-2.5V6c0-.3.2-.5.5-.5h7c.3 0 .5.2.5.5v7z",fill:L})),(0,n.createElement)("svg",{version:"1.1",id:"Layer_1",xmlns:"http://www.w3.org/2000/svg",x:"0px",y:"0px",viewBox:"0 0 1080 1080",xmlSpace:"preserve"},(0,n.createElement)("g",null,(0,n.createElement)("g",null,(0,n.createElement)("path",{className:"st0",d:"M828.5,552.9c-6.8,152.9-133.3,275.1-287.9,275.1c-158.9,0-288.2-129.3-288.2-288.2 c0-150.6,116.2-274.5,263.5-287.1V0.4C229.1,13.2,0.5,249.9,0.5,539.9c0,298.2,241.7,540.1,540.1,540.1 c293.9,0,533-234.8,539.8-527H828.5V552.9z"}),(0,n.createElement)("rect",{x:"518.9",y:"254.6",className:"st1",width:"309.8",height:"298.2"})))),(0,n.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)("rect",{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)("g",null,(0,n.createElement)("path",{d:"M2 1h16c.55 0 1 .45 1 1v16c0 .55-.45 1-1 1H2c-.55 0-1-.45-1-1V2c0-.55.45-1 1-1zm7.01 7.99v-6H3v6h6.01zm8 0v-6h-6v6h6zm-8 8.01v-6H3v6h6.01zm8 0v-6h-6v6h6z",fill:L}))),(0,n.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)("rect",{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)("g",null,(0,n.createElement)("path",{d:"M17 10c0-3.87-3.14-7-7-7-3.87 0-7 3.13-7 7s3.13 7 7 7c3.86 0 7-3.13 7-7zm-6.3 1.48H9.14v-.43c0-.38.08-.7.24-.98s.46-.57.88-.89c.41-.29.68-.53.81-.71.14-.18.2-.39.2-.62 0-.25-.09-.44-.28-.58-.19-.13-.45-.19-.79-.19-.58 0-1.25.19-2 .57l-.64-1.28c.87-.49 1.8-.74 2.77-.74.81 0 1.45.2 1.92.58.48.39.71.91.71 1.55 0 .43-.09.8-.29 1.11-.19.32-.57.67-1.11 1.06-.38.28-.61.49-.71.63-.1.15-.15.34-.15.57v.35zm-1.47 2.74c-.18-.17-.27-.42-.27-.73 0-.33.08-.58.26-.75s.43-.25.77-.25c.32 0 .57.09.75.26s.27.42.27.74c0 .3-.09.55-.27.72-.18.18-.43.27-.75.27-.33 0-.58-.09-.76-.26z",fill:L}))),(0,n.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)("rect",{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)("g",null,(0,n.createElement)("path",{d:"M19 2v6H1V2h18zm-1 5V3H2v4h16zM5 4v2H3V4h2zm3 0v2H6V4h2zm3 0v2H9V4h2zm3 0v2h-2V4h2zm3 0v2h-2V4h2zm2 5v9H1V9h18zm-1 8v-7H2v7h16zM5 11v2H3v-2h2zm3 0v2H6v-2h2zm3 0v2H9v-2h2zm6 0v2h-5v-2h5zm-6 3v2H3v-2h8zm3 0v2h-2v-2h2zm3 0v2h-2v-2h2z",fill:L}))),(0,n.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 278.799 278.799"},(0,n.createElement)("g",null,(0,n.createElement)("path",{d:"M265.54,0H13.259C5.939,0,0.003,5.936,0.003,13.256v252.287c0,7.32,5.936,13.256,13.256,13.256H265.54 c7.318,0,13.256-5.936,13.256-13.256V13.255C278.796,5.935,272.86,0,265.54,0z M252.284,252.287H26.515V26.511h225.769V252.287z",fill:L}))),(0,n.createElement)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"},(0,n.createElement)("rect",{x:"0",fill:"none",width:"20",height:"20"}),(0,n.createElement)("g",null,(0,n.createElement)("path",{d:"M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z",fill:L}))),h),N={title:(0,i.__)("Section Title"),description:(0,i.__)("Gutenify Title."),icon:(0,n.createElement)(a.Icon,{icon:O}),keywords:["gutenify",(0,i.__)("Section Title"),(0,i.__)("Title"),(0,i.__)("heading")],example:{attributes:{}},attributes:B,edit:e=>{const{attributes:t,setAttributes:l}=e,{textAlignment:a,prefixContent:r,titleContent:c,suffixContent:f,prefixColor:g,titleColor:v,suffixColor:u,displayPrefix:d,displaySuffix:p,prefixTag:w,titleTag:x,suffixTag:E,blockClientId:C}=t,b=o()(`has-text-align-${a}`,`gutenify-section-${C}`,`${h.name.replace(/\//gm,"-")}-version-${h.version}`),z=(0,s.useBlockProps)({className:b});return(0,n.createElement)("div",z,(0,n.createElement)(m,e,d&&(0,n.createElement)(s.RichText,{tagName:w,value:r,onChange:e=>l({prefixContent:e}),placeholder:(0,i.__)("Title prefix"),style:{textAlign:a,color:g},onClick:()=>{l({selectedTitle:"prefix"})},className:"gutenify-section-title-prefix"}),(0,n.createElement)(s.RichText,{tagName:x,value:c,onChange:e=>l({titleContent:e}),placeholder:(0,i.__)("Title"),style:{textAlign:a,color:v},onClick:()=>{l({selectedTitle:"title"})},className:"gutenify-section-title-main"}),p&&(0,n.createElement)(s.RichText,{tagName:E,value:f,onChange:e=>l({suffixContent:e}),placeholder:(0,i.__)("Title suffix"),style:{textAlign:a,color:u},onClick:()=>{l({selectedTitle:"suffix"})},className:"gutenify-section-title-suffix"})))},save:()=>{},supports:{html:!1}};(0,r.registerBlockType)(A,{...N})},4184:(e,t)=>{var l;!function(){"use strict";var n={}.hasOwnProperty;function i(){for(var e=[],t=0;t<arguments.length;t++){var l=arguments[t];if(l){var a=typeof l;if("string"===a||"number"===a)e.push(l);else if(Array.isArray(l)){if(l.length){var r=i.apply(null,l);r&&e.push(r)}}else if("object"===a)if(l.toString===Object.prototype.toString)for(var c in l)n.call(l,c)&&l[c]&&e.push(c);else e.push(l.toString())}}return e.join(" ")}e.exports?(i.default=i,e.exports=i):void 0===(l=function(){return i}.apply(t,[]))||(e.exports=l)}()}},l={};function n(e){var i=l[e];if(void 0!==i)return i.exports;var a=l[e]={exports:{}};return t[e](a,a.exports,n),a.exports}n.m=t,e=[],n.O=(t,l,i,a)=>{if(!l){var r=1/0;for(m=0;m<e.length;m++){for(var[l,i,a]=e[m],c=!0,o=0;o<l.length;o++)(!1&a||r>=a)&&Object.keys(n.O).every((e=>n.O[e](l[o])))?l.splice(o--,1):(c=!1,a<r&&(r=a));if(c){e.splice(m--,1);var s=i();void 0!==s&&(t=s)}}return t}a=a||0;for(var m=e.length;m>0&&e[m-1][2]>a;m--)e[m]=e[m-1];e[m]=[l,i,a]},n.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return n.d(t,{a:t}),t},n.d=(e,t)=>{for(var l in t)n.o(t,l)&&!n.o(e,l)&&Object.defineProperty(e,l,{enumerable:!0,get:t[l]})},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={3349:0,2954:0};n.O.j=t=>0===e[t];var t=(t,l)=>{var i,a,[r,c,o]=l,s=0;if(r.some((t=>0!==e[t]))){for(i in c)n.o(c,i)&&(n.m[i]=c[i]);if(o)var m=o(n)}for(t&&t(l);s<r.length;s++)a=r[s],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(m)},l=globalThis.webpackChunkgutenify=globalThis.webpackChunkgutenify||[];l.forEach(t.bind(null,0)),l.push=t.bind(null,l.push.bind(l))})();var i=n.O(void 0,[2954],(()=>n(9294)));i=n.O(i)})();