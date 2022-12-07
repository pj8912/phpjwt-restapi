
create table users(

user_id int(11) AUTO_INCREMENT Primary key not null	,	
user_fullname	varchar(256)	not null	,	
user_email	varchar(256)	not null	,				
user_pwd	varchar(256)	not null	,	
created_at	datetime   DEFAULT CURRENT_TIMESTAMP,
last_seen	datetime   DEFAULT CURRENT_TIMESTAMP
);


