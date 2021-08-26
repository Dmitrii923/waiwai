<?php

class SQL
{
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_d_table($d_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $d_table(
	seq          integer       primary key,
	id           varchar (20),
	ip_address   varchar (40)  not null,
	remote_host  varchar (60)  not null,
	host_domain  varchar (40)  not null,
	a_date       date          not null,
	a_wday       char (3)      not null,
	l_time       time          not null,
	f_time       time          not null,
	visit        int           not null,
	referrer     int,
	page_route   varchar (200) not null,
	route_time   varchar (300),
	click_route  varchar (200),
	search_words varchar (100),
	ua_type      varchar (10),
	ua_full      varchar (300),
	ua           varchar (80),
	os           varchar (40),
	display_size varchar (20),
	client_size  varchar (20)
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_i_table($i_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $i_table(
	name varchar (200) not null,
	type varchar (20)  not null,
	cnt  int           not null,
	primary key (name,type)
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_t_table($t_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $t_table(
	t_date  date unique not null,
	y_date  date unique not null,
	u_t     int  unique default 0,
	p_t     int  unique default 0,
	u_check int  unique not null
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_n_table($n_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $n_table(
	no    int                  not null,
	url   varchar (200) unique not null,
	title varchar (200),
	primary key (no)
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_e_table($e_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $e_table(
	a_date      date          not null,
	a_wday      char (3)      not null,
	a_time      time          not null,
	status_code int           not null,
	ip_address  varchar (40)  not null,
	remote_host varchar (40)  not null,
	request_url varchar (200) not null,
	referrer    varchar (200)
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
	
	//---------------------------------------------------------
	//  SQL文取得
	//---------------------------------------------------------
	
	function create_l_table($l_table)
	{
		
		// SQLを定義
		$sql = <<<_SQL_
create table if not exists $l_table(
	a_date date     not null,
	a_wday char (3) not null,
	u_td   int default 0,
	p_td   int default 0,
	u_00   int default 0,
	u_01   int default 0,
	u_02   int default 0,
	u_03   int default 0,
	u_04   int default 0,
	u_05   int default 0,
	u_06   int default 0,
	u_07   int default 0,
	u_08   int default 0,
	u_09   int default 0,
	u_10   int default 0,
	u_11   int default 0,
	u_12   int default 0,
	u_13   int default 0,
	u_14   int default 0,
	u_15   int default 0,
	u_16   int default 0,
	u_17   int default 0,
	u_18   int default 0,
	u_19   int default 0,
	u_20   int default 0,
	u_21   int default 0,
	u_22   int default 0,
	u_23   int default 0,
	p_00   int default 0,
	p_01   int default 0,
	p_02   int default 0,
	p_03   int default 0,
	p_04   int default 0,
	p_05   int default 0,
	p_06   int default 0,
	p_07   int default 0,
	p_08   int default 0,
	p_09   int default 0,
	p_10   int default 0,
	p_11   int default 0,
	p_12   int default 0,
	p_13   int default 0,
	p_14   int default 0,
	p_15   int default 0,
	p_16   int default 0,
	p_17   int default 0,
	p_18   int default 0,
	p_19   int default 0,
	p_20   int default 0,
	p_21   int default 0,
	p_22   int default 0,
	p_23   int default 0,
	primary key (a_date)
);
_SQL_;
		
		// SQLを返す
		return $sql;
		
	}
	
}

