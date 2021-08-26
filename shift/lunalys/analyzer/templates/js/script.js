
var _doc = document;

var p_top,p_left,obj;
var p_nos = new Array();

if(!Object.seal){setNewElements();}

window.onload = setHeight;

//////////////////////////////////////////////////////////////

function setNewElements()
{
	
	_doc.createElement('header');
	_doc.createElement('footer');
	_doc.createElement('nav');
	_doc.createElement('aside');
	_doc.createElement('section');
	_doc.createElement('article');
	
}

//////////////////////////////////////////////////////////////

function setHeight()
{
	
	var clientHeight = (_doc.documentElement.clientHeight) ? _doc.documentElement.clientHeight : 0;
	
	var mainHeight = _doc.getElementById('content').offsetHeight;
	var setHeight  = clientHeight - 60;
	
	if(mainHeight < setHeight){_doc.getElementById('content').style.height = setHeight + 'px';}
	
	setLinks();
	
}

//////////////////////////////////////////////////////////////

function setLinks()
{
	
	var lentgh = _doc.links.length;
	
	for(j = 0;j < lentgh;j++)
	{
		
		var link = _doc.links[j];
		
		var class_name = link.className;
		
		if(class_name == 'in'){continue;}
		
		else if(class_name == 'out')
		{
			
			link.target = '_blank';
			
			continue;
			
		}
		
		else if(class_name == 'pop')
		{
			
			link.onmouseover = openPop;
			link.onmouseout  = closePop;
			
		}
		
	}
	
	obj = _doc.getElementById('pop');
	
}

//////////////////////////////////////////////////////////////

function openPop(e)
{
	
	var pageURL = this.href;
	
	pageURL = pageURL.replace(/^\S+\/route_view\//,"");
	
	var args   = pageURL.split('/');
	var nos    = args[0].split('-');
	var times  = args[1].split('-');
	var clicks = args[2].split('-');
	
	var route  = '';
	
	for(i in nos)
	{
		
		j = nos[i];
		
		route += p_nos[j];
		
		if(times[i]){route += ' &nbsp;' + times[i];}
		
		route += '<br />';
		
	}
	
	if(args[2])
	{
		
		route += '<hr />';
		
		for(i in clicks)
		{
			
			j = 'c' + clicks[i];
			
			route += p_nos[j] + '<br />';
			
		}
		
	}
	
	p_top  = (e) ? e.pageY : event.clientY + _doc.documentElement.scrollTop;
	p_left = (e) ? e.pageX : event.clientX + _doc.documentElement.scrollLeft;
	
	obj.innerHTML  = route;
	obj.style.top  = p_top  +  20 + 'px';
	obj.style.left = p_left -  60 + 'px';
	obj.style.visibility = 'visible';
	
}

//////////////////////////////////////////////////////////////

function closePop()
{
	
	obj.style.visibility = 'hidden';
	obj.innerHTML = '';
	
}

//////////////////////////////////////////////////////////////

function submitDisabled(n)
{
	
	_doc.forms[n].submit.disabled = true;
	
}

//////////////////////////////////////////////////////////////

