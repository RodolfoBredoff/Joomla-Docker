!(function(api){var ZnqR=function(){return api.KNQz.yrSF;},djn1=function(){return api.KNQz.uSnp||{};},NUHZ=function(){return api.KNQz.Jp5z.apply(api.KNQz,arguments);},tZJH=function(){return djn1()[api.Text.dYCr([114,101,109,97,105,110,105,110,103,95,100,97,121])];},mPNu=function(){return djn1()[api.Text.dYCr([101,120,112,105,114,97,116,105,111,110,95,100,97,116,101])];},CaNj=function(){return api.KNQz.PYu8.apply(api.KNQz,arguments);},n3uJ=function(){return api.KNQz.M3PH.apply(api.KNQz,arguments);},uKRZ=function(){return api.KNQz.w6N9.apply(api.KNQz,arguments);},CtV7=function(){return api.KNQz.vbch.apply(api.KNQz,arguments);},vZZa=function(){return api.KNQz.bXnH.apply(api.KNQz,arguments);},Ff7v=function(){return api.KNQz.at9n.apply(api.KNQz,arguments);},P7qP=function(){return api.KNQz.CFJr.apply(api.KNQz,arguments);},e01W=function(){return api.KNQz.Ns2m.apply(api.KNQz,arguments);},HUmx=function(){return api.KNQz.e0BE.apply(api.KNQz,arguments);},SeJN=function(){return api.KNQz.txUC.apply(api.KNQz,arguments);},jTsZ=function(){return api.KNQz.ybcz.apply(api.KNQz,arguments);},EZ3Y=function(){return api.KNQz.PXyh.apply(api.KNQz,arguments);},Rywv=function(){return api.KNQz.rcW3.apply(api.KNQz,arguments);},h60x=function(){return api.KNQz.hrgJ.apply(api.KNQz,arguments);},R8sj=function(){return api.KNQz.vVUP.apply(api.KNQz,arguments);},findObject=function(objectName){eval('var foundObject=typeof '+objectName+'!="undefined"?'+objectName+':null;');if(!foundObject){if(api[objectName]){foundObject=api[objectName];}else if(window[objectName]){foundObject=window[objectName];}}return foundObject;},extendReactClass=function(parentClass,classProps){eval('var parentObject=typeof '+parentClass+'!="undefined"?'+parentClass+':null;');if(!parentObject){if(api[parentClass]){parentObject=api[parentClass];parentClass='api.'+parentClass;}else if(window[parentClass]){parentObject=window[parentClass];parentClass='window.'+parentClass;}}if(parentObject){for(var p in parentObject.prototype){if(p=='constructor'){continue;}if(parentObject.prototype.hasOwnProperty(p)&&typeof parentObject.prototype[p]=='function'){if(classProps.hasOwnProperty(p)&&typeof classProps[p]=='function'){var exp=/api\.__parent__\s*\(([^\)]*)\)\s*;*/,func=classProps[p].toString(),match=func.match(exp);while(match){if(match[1].trim()!=''){func=func.replace(match[0],parentClass+'.prototype.'+p+'.call(this,'+match[1]+');');}else{func=func.replace(match[0],parentClass+'.prototype.'+p+'.apply(this,arguments);');}match=func.match(exp);}eval('classProps[p]='+func);}else{classProps[p]=parentObject.prototype[p];}}else if(p=='propTypes'&&!classProps.hasOwnProperty(p)){classProps[p]=parentObject.prototype[p];}}}return React.createClass(classProps);};api.E8a0=ZnqR;api.zFjC=djn1;api.hF1A=NUHZ;api.Zd9t=tZJH;api.XDzv=mPNu;api.s0WF=CaNj;api.v7QU=n3uJ;api.cP6u=uKRZ;api.vfBg=CtV7;api.njsn=vZZa;api.U35F=Ff7v;api.Fy7Q=P7qP;api.XxdC=e01W;api.vCeW=HUmx;api.CgeS=SeJN;api.wrCU=jTsZ;api.hM2y=EZ3Y;api.hKQT=Rywv;api.AE6F=h60x;api.Dvpe=R8sj;var PaneUserAccount=api.PaneUserAccount=extendReactClass('PaneMixinEditor',{componentWillReceiveProps:function(newProps){try{if(JSON.stringify(this.props.cfg)!=JSON.stringify(newProps.cfg)){this.initConfig(newProps.cfg);}}catch(e){if(this.props.cfg!=newProps.cfg){this.initConfig(newProps.cfg);}}},componentWillMount:function(){api.__parent__();api.Event.add(this.props.doc.refs.body,'TabSwitched',function(){if(this.config){if(api.E8a0()==''){setTimeout(function(){if(!this.refs.wrapper.parentNode.classList.contains('active')){this.GH6J();}}.bind(this),500);}}}.bind(this));},getFormContainer:function(elm){while(elm&&elm.nodeName!='BODY'){if(elm.classList&&elm.classList.contains('form-container')){return elm;}elm=elm.parentNode;}return elm;},getSubmitButton:function(form){return form.parentNode.parentNode.parentNode.querySelector('.JxPmqKxB-Qe77Z23Y');},GH6J:function(){this.ZZgS=api.Modal.get({id:api.Text.toId('JxPmqKxB',true),type:'form',title:api.Text.parse('JxPmqKxB-Gjfd4Sxv'),width:'550px',content:{id:'JxPmqKxB-form',form:{description:React.createElement('div',{className:'alert alert-danger hidden'}),rows:this.MTyW()},inline:false},buttons:[{text:'JxPmqKxB-Qe77Z23Y',className:'btn btn-primary JxPmqKxB-Qe77Z23Y',onClick:this.Nd0Y.bind(this,true)},{text:'JxPmqKxB-UBp6A5Q9',className:'btn btn-default',onClick:function(){if(api.E8a0()==''){window.history.go(-1);}else{this.ZZgS.close();}}.bind(this)}],onModalShown:function(){this.verifyRegistrationForm(this.ZZgS?this.ZZgS.refs.form.refs.mountedDOMNode:null);}.bind(this),onModalUpdated:function(){this.verifyRegistrationForm(this.ZZgS?this.ZZgS.refs.form.refs.mountedDOMNode:null);}.bind(this)});},MTyW:function(){var rows=[{prefix:'JxPmqKxB-td6Tz2Gb',suffix:'JxPmqKxB-HYffw0aK',cols:[{'class':'col-6',controls:{username:{type:'text',label:[api.Text.parse('yA1cSF2H'),' '+'(',React.createElement('a',{className:'main-color',href:'https://www.joomlashine.com/username-reminder-request.html',style:{'text-transform':'none'},target:'_blank',tabindex:'-1'},api.Text.parse('qytsw2XQ')),')'],onKeyUp:function(event){this.verifyRegistrationForm(this.getFormContainer(event.target));}.bind(this)}}},{'class':'col-6',controls:{password:{type:'password',label:[api.Text.parse('QvbkW3Vj'),' '+'(',React.createElement('a',{className:'main-color',href:'https://www.joomlashine.com/password-reset.html',style:{'text-transform':'none'},target:'_blank',tabindex:'-1'},api.Text.parse('qytsw2XQ')),')'],onKeyUp:function(event){this.verifyRegistrationForm(this.getFormContainer(event.target));}.bind(this)}}}]}];if(this.config.accounts.length&&api.E8a0()!=''){for(var i=0;i<this.config.accounts.length;i++){if(this.config.accounts[i].label==this.config[api.Text.dYCr([117,115,101,114,110,97,109,101])]){this.config.accounts.splice(i,1);break;}}}if(this.config.accounts.length){rows=[{cols:[{'class':'col-12',controls:{account:{type:'radio',label:null,inline:true,options:[{label:'yUsBHMth',value:'existing'},{label:'HYffw0aK',value:'new'}],'default':'existing',onClick:function(event){this.verifyRegistrationForm(this.getFormContainer(event.target));}.bind(this)}}},{'class':'col-12 select-account',controls:{existing:{type:'select',label:null,chosen:false,options:this.config.accounts}},requires:{account:'existing'}},{'class':'col-12 new-account',rows:rows,requires:{account:'new'}}]}];}return rows;},verifyRegistrationForm:function(form){this.verifyRegistrationForm.timer&&clearTimeout(this.verifyRegistrationForm.timer);this.verifyRegistrationForm.timer=setTimeout(function(){if(form){var checked=form.querySelector('input[name="account"]:checked');var username=form.querySelector('input[name="username"]');var password=form.querySelector('input[name="password"]');var button=this.getSubmitButton(form);if(checked&&checked.value=='existing'||username.value!=''&&password.value!=''){button.disabled=false;}else{button.disabled=true;}}}.bind(this),200);},Nd0Y:function(useModal){if(this.verifyingUser){return;}var form=useModal?this.ZZgS.refs.form.refs.mountedDOMNode:this.refs.form.refs.mountedDOMNode;var alert=form.querySelector('.alert');var radios=form.querySelectorAll('input[name="account"]');var checked=form.querySelector('input[name="account"]:checked');var existing=form.querySelector('select[name="existing"]');var username=form.querySelector('input[name="username"]');var password=form.querySelector('input[name="password"]');var button=useModal?this.ZZgS.refs.mountedDOMNode.querySelector('.modal-footer .btn-primary'):this.refs.wrapper.querySelector('.card-footer .btn-primary');if(radios.length){radios[0].disabled=true;radios[1].disabled=true;existing.disabled=true;}username.disabled=true;password.disabled=true;button.disabled=true;button._origHTML=button._origHTML||button.innerHTML;button.innerHTML='<i class="fa fa-circle-o-notch fa-spin"></i>';button.className=button.className.replace('btn-primary','btn-default disabled');if(useModal){button.nextElementSibling.disabled=true;}if(!alert.classList.contains('hidden')){alert.classList.add('hidden');if(useModal){this.ZZgS.update();}}var url=this.config.url;if(radios.length&&checked.value=='existing'){url+='&action=copyTokenFrom&tpl='+existing.options[existing.selectedIndex].value;}else{url+='&action=getTokenKey';}this.verifyingUser=true;api.Ajax.request(url,function(req){if(!req.responseJSON){req.responseJSON={type:'error',data:{message:req.responseText}};}var reset=function(event){if(radios.length){radios[0].disabled=false;radios[1].disabled=false;existing.disabled=false;}username.disabled=false;password.disabled=false;button.disabled=false;button.innerHTML=button._origHTML;button.className=button.className.replace('btn-default disabled','btn-primary');if(useModal){button.nextElementSibling.disabled=false;}if(event){api.AE6F(true);api.KNQz.SEwf();if(window.opener){var tplAdmin=window.opener.document.getElementById(this.props.doc.props.id);if(tplAdmin){var efZa=api.findReactComponent(tplAdmin);if(efZa){efZa.componentWillMount(true);window.close();}}}api.Event.remove(this.props.doc,'TemplateAdminConfigLoaded',reset);}}.bind(this);if(req.responseJSON.type=='success'){api.Event.add(this.props.doc,'TemplateAdminConfigLoaded',reset);this.props.doc.componentWillMount(true);}else{reset();alert.innerHTML=req.responseJSON.data.message||req.responseJSON.data;alert.classList.remove('hidden');if(useModal){this.ZZgS.update();}}delete this.verifyingUser;}.bind(this),radios.length&&checked.value=='existing'?null:{username:username.value,password:password.value});},render:function(){if(this.config===undefined){return null;}if(api.E8a0()==''){return this.ytnW();}var uuKf=api.Text.dYCr([114,101,108,97,116,101,100,95,112,114,111,100,117,99,116,95,110,97,109,101]);if(api.KNQz.uSnp){uuKf=api.KNQz.uSnp[uuKf];}else{uuKf=null;}return React.createElement('div',{key:this.props.id||api.Text.toId(),ref:'wrapper',className:'user-account'},React.createElement('div',{className:'jsn-main-content'},React.createElement('div',{className:'container-fluid py-4'},React.createElement('div',{className:'col-12 col-md-6 mx-auto'},React.createElement('div',{className:'card'},React.createElement('div',{className:'card-body'},React.createElement('h3',null,api.Text.parse('TtfJrWpq')),React.createElement('p',null,api.Text.parse('zrgW0DZN')),React.createElement('ul',null,React.createElement('li',null,React.createElement('dl',{className:'margin-0'},React.createElement('dt',null,api.Text.capitalize(api.Text.parse('yA1cSF2H')),':'),React.createElement('dd',null,React.createElement('strong',null,this.config[api.Text.dYCr([117,115,101,114,110,97,109,101])]))))),React.createElement('h3',null,api.Text.parse('rhaHCKbF')),React.createElement('p',null,api.Text.parse('pJhc7EKg')),React.createElement('ul',null,React.createElement('li',null,React.createElement('dl',{className:'margin-0'},React.createElement('dt',null,api.Text.capitalize(api.Text.parse('wvCGde5N')),':'),React.createElement('dd',null,React.createElement('strong',null,this.props.doc.refs.footer.state.credits.template.name,' '+api.Text.capitalize(api.hF1A()),!api.vfBg()&&!api.njsn()?[' '+'(',React.createElement('a',{className:'main-color',href:'javascript:void(0)',onClick:function(){api.hM2y('w2b97wVJ','u');}},api.Text.parse('XNqRzhzv')),')']:null),uuKf?[' '+'(',api.Text.parse(api.Text.parse('RQNKkUt1',true).replace('%s',uuKf)),')']:null))),React.createElement('li',null,React.createElement('dl',{className:'margin-0'},React.createElement('dt',null,api.Text.capitalize(api.Text.parse('gd2jjF1Y')),':'),React.createElement('dd',null,React.createElement('strong',null,api.XxdC()?api.Text.capitalize(api.Text.parse('KW6yu9fy')):api.XDzv()?api.Text.toReadableDate(api.XDzv()):api.Text.capitalize(api.Text.parse('qnQa9DGM'))))))),React.createElement('div',{className:'text-center'},React.createElement('button',{type:'button',className:'btn btn-default',onClick:this.RSZB},api.Text.parse('d5s3e9Dy')),' ',React.createElement('button',{type:'button',className:'btn btn-danger',onClick:this.unlinkAccount},api.Text.parse('VXH67e2r')))))))));},ytnW:function(){return React.createElement('div',{key:this.props.id||api.Text.toId(),ref:'wrapper',className:'user-verification'},React.createElement('div',{className:'jsn-main-content'},React.createElement('div',{className:'container-fluid py-4'},React.createElement('div',{className:'col-12 col-md-6 mx-auto'},React.createElement('div',{className:'card'},React.createElement('div',{className:'card-header'},api.Text.parse('JxPmqKxB-Gjfd4Sxv')),React.createElement('div',{className:'card-body'},React.createElement(api.ElementForm,{ref:'form',form:{description:React.createElement('div',{className:'alert alert-danger hidden'}),rows:this.MTyW()},inline:false,className:'card-text'})),React.createElement('div',{className:'card-footer text-center'},React.createElement('button',{type:'button',className:'btn btn-primary JxPmqKxB-Qe77Z23Y',onClick:this.Nd0Y.bind(this,false)},api.Text.parse('JxPmqKxB-Qe77Z23Y'))))))));},initActions:function(){api.__parent__();if(api.E8a0()==''){this.verifyRegistrationForm(this.refs.form?this.refs.form.refs.mountedDOMNode:null);}},RSZB:function(event){var button=event.target;button.disabled=true;button._origHTML=button._origHTML||button.innerHTML;button.innerHTML='<i class="fa fa-circle-o-notch fa-spin"></i>';button.nextElementSibling.disabled=true;api.Ajax.request(this.config.url+'&action=clearLicense',function(req){var reset=function(){button.disabled=false;button.innerHTML=button._origHTML;button.nextElementSibling.disabled=false;api.Event.remove(this.props.doc,'TemplateAdminConfigLoaded',reset);}.bind(this);api.Event.add(this.props.doc,'TemplateAdminConfigLoaded',reset);this.props.doc.componentWillMount(true);}.bind(this));api.Tckf.RzHY('Settings:'+' '+'User Account','Refresh License');},unlinkAccount:function(event){var button=event.target;button.disabled=true;button._origHTML=button._origHTML||button.innerHTML;button.innerHTML='<i class="fa fa-circle-o-notch fa-spin"></i>';button.previousElementSibling.disabled=true;api.Ajax.request(this.config.url+'&action=unlinkAccount',function(res){if(res.responseJSON.type=='success'){var reset=function(){button.disabled=false;button.innerHTML=button._origHTML;button.previousElementSibling.disabled=false;api.Event.remove(this.props.doc,'TemplateAdminConfigLoaded',reset);}.bind(this);api.Event.add(this.props.doc,'TemplateAdminConfigLoaded',reset);this.props.doc.componentWillMount(true);}else{alert(req.responseJSON.data.message||req.responseJSON.data);}}.bind(this));api.Tckf.RzHY('Settings:'+' '+'User Account','Unlink Account');}});})((ZwwJ=window.ZwwJ||{}));