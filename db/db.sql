CREATE DATABASE sn15 CHARACTER SET 'utf8';                                       
USE sn15;                                                                        
                                                                                 
CREATE TABLE Users (                                                             
    userid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,                            
    username VARCHAR(30),                                                        
    password VARCHAR(30),                                                        
    email VARCHAR(30) NOT NULL UNIQUE,                                   
    name VARCHAR(30) NOT NULL,                                                   
    PRIMARY KEY (userid)                                                         
);                                                                               
                                                                                 
CREATE TABLE Products (                                                          
    productid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,                         
    userid SMALLINT UNSIGNED,                                                    
    name VARCHAR(30),                                                            
    img VARCHAR(30),                                                             
    smalldescription VARCHAR(240),                                               
    description VARCHAR(300),                                                    
    price VARCHAR(30) NOT NULL,                                                  
    tagsid SMALLINT UNSIGNED,                                                    
  --  expirarion-date VARCHAR(30) NOT NULL,                                      
    storelocation VARCHAR(30) NOT NULL,                                          
    PRIMARY KEY (productid)                                                      
);                                                                               
                                                                                 
CREATE TABLE Tags (                                                              
    tagid SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,                             
    tag VARCHAR(30),                                                             
    PRIMARY KEY (tagid)                                                          
);