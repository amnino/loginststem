# loginststem
complete loginsystem built in php. using database, encryption, session ....... styling has not been done!


all you need to do to start this code going.... is create a database first..... the following code study will provide a database suitable for this feature to be used...

CREATE TABLE users(
  id int(200) not null PRIMARY KEY AUTO_INCREMENT,
  uid varchar(255) not null unique,
  pw varchar(255) not null unique
  );
  
  ... you are on the go!!!!!
  creation of the first user will be must in this case..... drop the session section in usermaker.php and then it will not check for the user in the first time... then you can directly create the user.... then use all the features form the main menu...
