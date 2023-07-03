 create database project_management;
 CREATE TABLE projects(
 id int not  null AUTO_INCREMENT PRIMARY KEY,
 project_name varchar(255) not null,
 created_at timestamp,
 updated_at timestamp
 );

 CREATE TABLE tasks(
                       id int not null AUTO_INCREMENT PRIMARY KEY,
                       task_name varchar(255) not null,
                       task_description varchar(255) not null,
                       project_id int not null,
     				   deleted_at timestamp null,
                       created_at timestamp,
                       update_at timestamp,
                       FOREIGN key (project_id) REFERENCES projects(id)
 );

create TABLE images(
id int not null AUTO_INCREMENT PRIMARY key,
images varchar(250),
model_type varchar(250),
model_id int,
created_at timestamp,
updated_at timestamp);
