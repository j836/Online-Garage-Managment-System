drop table owner cascade;
drop table receipt cascade;
drop table vehicle cascade;
drop table customer cascade;
drop table service cascade;

create table customer(cust_mob int primary key ,cust_login varchar ,cust_pass varchar ,cust_name varchar(50) ,cust_add varchar);
\d customer;
create table vehicle(plate_no varchar primary key,chassis_no varchar(520) unique,company varchar,cust_mob int references customer(cust_mob)on delete cascade);
\d vehicle;

create table receipt(receipt_no int primary key,cust_mob int references customer(cust_mob),plate_no varchar references vehicle(plate_no)on delete cascade,total_bill int);

\d receipt;

create table owner(owner_login varchar unique,owner_pass varchar);
\d owner;

create table service(DOS date,serv_parts varchar,kms int,cust_mob int references customer(cust_mob)on delete cascade,plate_no varchar references vehicle(plate_no)on delete cascade);
\d service;


insert into customer values(1234567890,'a@gmail.com','12dsf','Prajwal','Dhayari');

insert into vehicle values('MH14BC3090','ASCDFG456UI14567','KTM',1234567890);
insert into receipt values(1234,1234567890,'MH14BC3090',3000);

insert into owner values('b@gamil.com','abcde');
insert into service values('2019/05/05','Engineoil',58000,1234567890,'MH14BC3090');


