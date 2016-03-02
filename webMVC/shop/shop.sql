create database if not exists itcast_shop;
use itcast_shop;


-- admin table

create table it_admin(
admin_id int unsigned not null primary key auto_increment,

admin_name varchar(20) not null,
admin_pass char(32) not null comment '-- md5',
email varchar(100) default '',

last_login int default 0,
last_ip varchar(15) comment '192.168.5.234',
last_ip_int int comment 'int ip'
	) engine=myisam charset = utf8 collate=utf8_general_ci;

insert into it_admin values(null, 'admin', md5('1234abcd'), 'admin@100.com', 0, '', 0);
insert into it_admin values(null, 'productor', md5('1234abcd'), 'productor@100.com', 0, '', 0);
insert into it_admin values(null, 'manager', md5('1234abcd'), 'manager@100.com', 0, '', 0);

create table it_session(
sess_id varchar(32) primary key not null,
sess_data text,
expire int comment '最后修改时间'
) charset=utf8;

create table category(
cat_id int unsigned not null primary key auto_increment,
cat_name varchar(100) not null,
sort_order int default 0 comment '排序',
parent_id int unsigned
) charset=utf8;

insert into it_category values(75, '分类kkk', 50, 0);
insert into it_category values(12, '分类FFF', 50, 75);
insert into it_category values(77, '分类AAA', 50, 75);
insert into it_category values(34, '分类XXX', 50, 12);
insert into it_category values(35, '分类HHH', 50, 12);
insert into it_category values(9, '分类QQQ', 50, 77);
insert into it_category values(28, '分类JJJ', 50, 35);
insert into it_category values(19, '分类MMM', 50, 35);

create table it_goods(
goods_id int unsigned not null primary key auto_increment,
goods_sn char(10) comment '货号',
goods_name varchar(50) comment '名称',
cat_id int unsigned comment '分类ID',
shop_price decimal(10, 2) comment '价格',
market_price decimal(10, 2) comment '市场价',
goods_desc text comment '商品描述',
add_time int comment '添加时间',
goods_number int comment '库存',
image_ori varchar(100) comment '商品原始上传图片地址',
image_thumb varchar(100) comment '商品缩略图图片地址',
goods_stutas int comment '商品状态, 采用位运算的形式管理, is_best, is_new, is_hot',
is_on_sale tinyint(1) comment '1表示上架, 0表示下架',
update_time timestamp default current_timestamp comment '更新时间'
) charset=utf8;
