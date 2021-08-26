
// Document Object
var _doc = document;

// PHP Path
var write_php = '';

if(!write_php)
{
	var i     = _doc.getElementsByTagName('script').length - 1;
	write_php = _doc.getElementsByTagName('script')[i].src;
	write_php = write_php.replace(/add.js/,'write.php');
}

// Head Element
var head = _doc.getElementsByTagName('head')[0];

// Domain
var domain = _doc.domain;

// RegExp Object
var regExp = new RegExp('^(http|https)://' + domain);

// Encode Exists
var encode = (window.encodeURIComponent) ? true : false;

// Arguments
var args = '';

//////////////////////////////////////////////////////////////

// Display Width
args += '&display_width=' + screen.width;

// Display Height
args += '&display_height=' + screen.height;

// Client Width
var client_width = (_doc.documentElement) ? parent._doc.documentElement.clientWidth : '';
if(!client_width){client_width = (_doc.body) ? parent._doc.body.clientWidth : '';}
if(!client_width){client_width = (window.innerWidth) ? parent.window.innerWidth : '';}
args += '&client_width=' + client_width;

// Client Height
var client_height = (_doc.documentElement) ? parent._doc.documentElement.clientHeight : '';
if(!client_height){client_height = (_doc.body) ? parent._doc.body.clientHeight : '';}
if(!client_height){client_height = (window.innerHeight) ? parent.window.innerHeight : '';}
args += '&client_height=' + client_height;

//////////////////////////////////////////////////////////////

// Request URL
var requestURL = write_php + '?guid=ON&act=add' + args + '&cache=' + (new Date()).getTime();

// Add Script Element
addElement(requestURL);

// Set onLoad Event
if(window.addEventListener){window.addEventListener('load',setEvent,false);}
else if(window.attachEvent){window.attachEvent('onload',setEvent);}

//////////////////////////////////////////////////////////////

// Add Script Element
function addElement(requestURL)
{
	
	// Create Element
	var element = _doc.createElement('script');
	
	// Set Attribute
	element.setAttribute('src',requestURL);
	element.setAttribute('type','text/javascript');
	
	// Append Child
	head.appendChild(element);
	
}

//////////////////////////////////////////////////////////////

// Set onMouseDown Event
function setEvent()
{
	
	// Vars Initialize
	var obj,link;
	
	// Regular Expression
	var pageExt = /\.(htm|php|cgi|jsp|asp)/i;
	var fileExt = /\.\w{2,4}$/i;
	
	// Link Length
	var linksLength = _doc.getElementsByTagName('a').length;
	
	// Link Elements Loop
	for(i = 0;i < linksLength;i++)
	{
		
		// Link Element
		obj = _doc.getElementsByTagName('a')[i];
		
		// href Attribute
		link = obj.href;
		
		// JavaScript is Continue
		if(link.match('javascript')){continue;}
		
		// Set onMouseDown Event
		else if(!link.match(regExp) || (!link.match(pageExt) && link.match(fileExt))){obj.onmousedown = clickLink;}
		
	}
	
}

//////////////////////////////////////////////////////////////

// onMouseDown Event
function clickLink()
{
	
	// URL
	var clickURL = (encode) ? encodeURIComponent(this.href) : this.href;
	
	// Title
	var clickTitle = (this.title) ? this.title : this.innerHTML;
	clickTitle = (encode) ? encodeURIComponent(clickTitle) : this.href;
	
	// RequestURL
	var clickRequestURL = write_php + '?act=click&url=' + clickURL + '&title=' + clickTitle;
	
	// Add Script Element
	addElement(clickRequestURL);
	
}

