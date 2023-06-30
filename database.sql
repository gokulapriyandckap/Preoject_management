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
                       task_image varchar(255) not null,
                       project_id int not null,
     				   is_deleted timestamp null,
                       created_at timestamp,
                       update_at timestamp,
                       FOREIGN key (project_id) REFERENCES projects(id)
 );


 CREATE TABLE trash
 (
     id int not null AUTO_INCREMENT PRIMARY KEY,
     projectid int,
     taskid int,
     FOREIGN KEY (projectid) REFERENCES projects(id),
     FOREIGN KEY (taskid) REFERENCES tasks(id)
 );