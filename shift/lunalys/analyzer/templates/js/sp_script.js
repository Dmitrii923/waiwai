
var _doc = document;

var p_top,p_left,obj;
var p_nos = new Array();

window.onload = setLinks;
window.onorientationchange = hideAdBar;

//////////////////////////////////////////////////////////////

function setLinks()
{
	
	hideAdBar();
	
	var lentgh = _doc.links.length;
	
	for(j = 0;j < lentgh;j++)
	{
		
		var link = _doc.links[j];
		
		var class_name = link.className;
		
		if(class_name == 'in'){continue;}
		
		else if(class_name == 'out')
		{
			
			link.target = '_blank';
			link.href += '::sp';
			
			continue;
			
		}
		
		else if(class_name == 'pop')
		{
			
			link.addEventListener('mousedown',openPop,false);
			//link.addEventListener('mouseout',closePop,false);
			//link.addEventListener('touchstart',openPop,false);
			//link.addEventListener('touchend' ,closePop,false);
			
			link.addEventListener('click',function(e){e.preventDefault()},false);
			
		}
		
		else
		{
			
			pageURL = link.href;
			pageURL = pageURL.replace(/index.php\//,"");
			pageURL = pageURL.replace(/analyzer/,"analyzer/index.php/sp");
			
			link.href = pageURL;
			
		}
		
	}
	
	obj = _doc.getElementById('pop');
	
	obj.addEventListener('mousedown',closePop,false);
	
}

//////////////////////////////////////////////////////////////

function hideAdBar()
{
	
	setTimeout("scrollTo(0,1)", 100);
	
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
	
	obj.innerHTML = route;
	
	p_top  = (e) ? e.pageY : event.touches[0].pageY;
	
	obj.style.top = p_top + 20 + 'px';
	
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

