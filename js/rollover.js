/**
 * Simple rollover
 * 
 * Copyright (c) 2009 Kyosuke Nakamura (kyosuke.jp)
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 */

$(function(){
	$('.rollover').each(function(){
		this.originalSrc = $(this).attr('src');
		this.rolloverSrc = this.originalSrc.replace(/(\.gif|\.jpg|\.png)$/, '_on'+"$1");
		this.rolloverImg = new Image();
		this.rolloverImg.src = this.rolloverSrc;
	}).hover(function(){
		$(this).attr('src',this.rolloverSrc);
	},function(){
		$(this).attr('src',this.originalSrc);
	});
});