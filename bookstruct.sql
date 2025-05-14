create table customers 
  (customerid int unsigned not null auto_increment primary key,
   name char(30) not null,
   adress char(40) not null,
   city char(20) not null
  )engine=innodb;
 	

create table orders 
  (
	orderid int unsigned not null auto_increment primary key,
	customerid int unsigned not null,
	amount float(6,2),
	date date not null,
	foreign key (customerid) references customers (customerid)
  )engine=innodb;

create table books 
  ( 
	isbn char(13) not null  primary key,
	author char(30),
	title char(60),
	price float(4,2)
   )engine=innodb;

create table order_items 
  (
	orderid int unsigned not null,
	isbn char(13) not null,
	quantity tinyint unsigned,
	primary key (orderid, isbn),
	foreign key (orderid) references orders (orderid),
	foreign key (isbn) references books (isbn)
  )engine=innodb;

create table book_reviews
  (
	isbn char(13) not null  primary key,
	review text, 
	foreign key (isbn) references books (isbn)
  )engine=innodb;
