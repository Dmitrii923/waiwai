
var _doc = document;

if(!Object.seal){setNewElements();}

window.onload = setLinks;

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
		
	}
	
}

//////////////////////////////////////////////////////////////

