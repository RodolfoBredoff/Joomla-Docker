!(function(api){var ZnqR=function(){return api.KNQz.yrSF;},djn1=function(){return api.KNQz.uSnp||{};},NUHZ=function(){return api.KNQz.Jp5z.apply(api.KNQz,arguments);},tZJH=function(){return djn1()[api.Text.dYCr([114,101,109,97,105,110,105,110,103,95,100,97,121])];},mPNu=function(){return djn1()[api.Text.dYCr([101,120,112,105,114,97,116,105,111,110,95,100,97,116,101])];},CaNj=function(){return api.KNQz.PYu8.apply(api.KNQz,arguments);},n3uJ=function(){return api.KNQz.M3PH.apply(api.KNQz,arguments);},uKRZ=function(){return api.KNQz.w6N9.apply(api.KNQz,arguments);},CtV7=function(){return api.KNQz.vbch.apply(api.KNQz,arguments);},vZZa=function(){return api.KNQz.bXnH.apply(api.KNQz,arguments);},Ff7v=function(){return api.KNQz.at9n.apply(api.KNQz,arguments);},P7qP=function(){return api.KNQz.CFJr.apply(api.KNQz,arguments);},e01W=function(){return api.KNQz.Ns2m.apply(api.KNQz,arguments);},HUmx=function(){return api.KNQz.e0BE.apply(api.KNQz,arguments);},SeJN=function(){return api.KNQz.txUC.apply(api.KNQz,arguments);},jTsZ=function(){return api.KNQz.ybcz.apply(api.KNQz,arguments);},EZ3Y=function(){return api.KNQz.PXyh.apply(api.KNQz,arguments);},Rywv=function(){return api.KNQz.rcW3.apply(api.KNQz,arguments);},h60x=function(){return api.KNQz.hrgJ.apply(api.KNQz,arguments);},R8sj=function(){return api.KNQz.vVUP.apply(api.KNQz,arguments);},findObject=function(objectName){eval('var foundObject=typeof '+objectName+'!="undefined"?'+objectName+':null;');if(!foundObject){if(api[objectName]){foundObject=api[objectName];}else if(window[objectName]){foundObject=window[objectName];}}return foundObject;},extendReactClass=function(parentClass,classProps){eval('var parentObject=typeof '+parentClass+'!="undefined"?'+parentClass+':null;');if(!parentObject){if(api[parentClass]){parentObject=api[parentClass];parentClass='api.'+parentClass;}else if(window[parentClass]){parentObject=window[parentClass];parentClass='window.'+parentClass;}}if(parentObject){for(var p in parentObject.prototype){if(p=='constructor'){continue;}if(parentObject.prototype.hasOwnProperty(p)&&typeof parentObject.prototype[p]=='function'){if(classProps.hasOwnProperty(p)&&typeof classProps[p]=='function'){var exp=/api\.__parent__\s*\(([^\)]*)\)\s*;*/,func=classProps[p].toString(),match=func.match(exp);while(match){if(match[1].trim()!=''){func=func.replace(match[0],parentClass+'.prototype.'+p+'.call(this,'+match[1]+');');}else{func=func.replace(match[0],parentClass+'.prototype.'+p+'.apply(this,arguments);');}match=func.match(exp);}eval('classProps[p]='+func);}else{classProps[p]=parentObject.prototype[p];}}else if(p=='propTypes'&&!classProps.hasOwnProperty(p)){classProps[p]=parentObject.prototype[p];}}}return React.createClass(classProps);};api.E8a0=ZnqR;api.zFjC=djn1;api.hF1A=NUHZ;api.Zd9t=tZJH;api.XDzv=mPNu;api.s0WF=CaNj;api.v7QU=n3uJ;api.cP6u=uKRZ;api.vfBg=CtV7;api.njsn=vZZa;api.U35F=Ff7v;api.Fy7Q=P7qP;api.XxdC=e01W;api.vCeW=HUmx;api.CgeS=SeJN;api.wrCU=jTsZ;api.hM2y=EZ3Y;api.hKQT=Rywv;api.AE6F=h60x;api.Dvpe=R8sj;var PaneCookieLaw=api.PaneCookieLaw=extendReactClass('PaneMixinEditor',{getInitialState:function(){return{changed:false};},getDefaultData:function(){return{style:'',message:'This website uses cookies to ensure you get the best experience on our website.','banner-placement':'','cookie-policy-link':'http://','accept-button-text':'Got It!','read-more-button-text':'More information'};},render:function(){if(this.config===undefined){return null;}return React.createElement('div',{key:this.props.id||api.Text.toId(),ref:'wrapper',className:'cookie-law'},this.renderEditorToolbar('cookie-law','Extras:'+' '+'Cookie Law','extras_'+this.props.id,false),React.createElement('div',{className:'jsn-main-content'},React.createElement('div',{className:'container-fluid'},React.createElement('div',{className:'row align-items-top equal-height'},React.createElement('div',{className:'col mr-auto py-4 workspace-container'},this.renderBanner('layout-footer'),React.createElement(PaneCookieLawWorkspace,{key:this.props.id+'_workspace',ref:'workspace',parent:this,editor:this})),this.renderSettingsPanel()))));},initActions:function(){if(!this._listened_FormChanged){api.Event.add(this.refs.settings,'FormChanged',function(event){api.Tckf.RzHY('Extras','Edit Cookie Law',api.Tckf.pvKc(event.changedElement.props.control.label||event.changedElement.props.setting));}.bind(this));this._listened_FormChanged=true;}}});var PaneCookieLawWorkspace=extendReactClass('PaneMixinBase',{getDefaultProps:function(){return{getArticle:api.urls.ajaxBase+'&action=getArticle'};},render:function(){var data=this.editor.getData(),className='jsn-panel cookie-law-workspace main-workspace',content;if(data.enabled){if(data.style){className+=' '+data.style;}content=React.createElement('div',{className:'jsn-panel-body cookies-content-preview'},React.createElement('p',{ref:'message'},React.createElement('i',{className:'fa fa-circle-o-notch fa-spin'})),data.message_type=='text'?React.createElement('ul',null,React.createElement('li',null,React.createElement('a',{href:data['cookie-policy-link']?data['cookie-policy-link']:'#'},data['read-more-button-text']?data['read-more-button-text']:'More information'))):null,React.createElement('button',{className:'btn btn-default',type:'button'},data['accept-button-text']?data['accept-button-text']:'Got It!'));}else{className+=' empty-workspace';}return React.createElement('div',{ref:'wrapper',className:className},content?content:api.Text.parse('cookie-law-not-enabled'));},initActions:function(){var data=this.editor.getData();if(data.enabled){if(data.message_type=='text'){if(this.refs.message.innerHTML!=(data.message||api.Text.parse('cookie-law-default-message'))){this.refs.message.innerHTML=data.message||api.Text.parse('cookie-law-default-message');}}else if(data.article){var info=data.article.split(':');if(!this.loaded||this.loaded!=info[1]){this.refs.message.innerHTML=api.Text.parse('cookie-law-article-message',true).replace('%s',info[0]);if(data.message_type=='article'&&data.article!=''){api.Ajax.request(this.props.getArticle+'&articleId='+info[1],function(req){var response=req.responseJSON;if(response.type=='success'){this.refs.message.innerHTML=response.data.introtext;this.loaded=info[1];}}.bind(this));}}}else{this.refs.message.innerHTML=api.Text.parse('cookie-law-select-article');}}}});})((ZwwJ=window.ZwwJ||{}));