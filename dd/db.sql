drop table owner cascade;
drop table receipt cascade;
drop table vehicle cascade;
drop table customer cascade;
drop table service cascade;

create table owner(owner_name varchar(20) primary key,owner_login varchar(20) ,owner_pass varchar(10),owner_mob varchar(10));
\d owner;



create table customer(cust_mob varchar(10) primary key ,cust_login varchar(20) ,cust_pass varchar(20) ,cust_name varchar(50) ,cust_add varchar(50),bike varchar(20),status int check(status<4),bill_status int check (bill_status<2),owner_name varchar(20) references owner(owner_name)on delete cascade);
\d customer;

create table vehicle(plate_no varchar(10) primary key,company varchar(10),cust_mob varchar(10) references customer(cust_mob)on delete cascade);
\d vehicle;

create table receipt(receipt_no int primary key,cust_mob varchar(10) references customer(cust_mob),plate_no varchar(10) references vehicle(plate_no)on delete cascade,total_bill int);

\d receipt;

create table service(DOS date,nextser int,serv_parts varchar(10),kms varchar(5),cust_mob varchar(10) references customer(cust_mob)on delete cascade,plate_no varchar(10) references vehicle(plate_no)on delete cascade);
\d service;
insert into owner values('a','b@gmail.com','abcde','0000000000');

insert into customer values('1234567890','a@gmail.com','123','Prajwal','Dhayari','platina',0,0,'a');
insert into customer values('1111111111','c@gmail.com','123','das','Dhayari','cbr',3,0,'a');

insert into vehicle values('MH14BC3090','KTM','1234567890');
insert into vehicle values('MH14BC3220','KTM','1111111111');
insert into receipt values(1234,'1234567890','MH14BC3090',3000);
insert into receipt values(1235,'1111111111','MH14BC3220',3000);

insert into service values('2019/05/05','3123','Engineoil',58000,'1234567890','MH14BC3090');


