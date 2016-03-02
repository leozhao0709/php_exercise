create table admin(id int auto_increment primary key,
username varchar(20),
password varchar(20)
) default charset=utf8;

insert into admin values('zhangsan', '1234abcd');

create table category(
	id int auto_increment primary key,
	name varchar(20),
	content varchar(20),
	cid int)default charset=utf8;
)

insert into category values(null, '手机', '', 0);
insert into category values(null, '电脑', '', 0);
insert into category values(null, '华为', '', 1);
insert into category values(null, '小米', '', 1);
insert into category values(null, '联想', '', 2);