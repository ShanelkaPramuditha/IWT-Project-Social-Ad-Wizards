/* CREATE TABLES */

-- Database Name : social_ad_wizads

-- Create Registered user table
CREATE TABLE `social_ad_wizards`.`registered_users` (
	`s_user_id` INT NOT NULL AUTO_INCREMENT ,
	`registered_date` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`profile_picture` VARCHAR(500) DEFAULT 'uploads/profile-pictures/default.jpg',
	`user_pass` VARCHAR(30) NOT NULL ,
	`email` VARCHAR(100) NOT NULL ,
	`gender` VARCHAR(6) NOT NULL ,
	`date_of_birth` DATE NOT NULL ,
	`first_name` VARCHAR(20) NOT NULL ,
	`last_name` VARCHAR(20) NOT NULL ,
	`phone_no` VARCHAR(10) NOT NULL ,
	`user_role` VARCHAR(10) NOT NULL ,
	PRIMARY KEY (`s_user_id`)) ENGINE = InnoDB;


INSERT INTO `registered_users` (`profile_picture`, `user_pass`, `email`, `gender`, `date_of_birth`, `first_name`, `last_name`, `phone_no`, `user_role`)
VALUES
	(DEFAULT, 'test@123', 'testuser@gmail.com', 'Male', '2000-05-01', 'Ftest', 'Ltest', '0771237653', 'manager'),
	('uploads/profile-pictures/user2.jpg', 'test2@123', 'testuser2@gmail.com', 'Female', '2001-06-12', 'John', 'Doe', '0771234567', 'user'),
	('uploads/profile-pictures/user3.jpg', 'test3@123', 'testuser3@gmail.com', 'Male', '1998-09-21', 'Jane', 'Smith', '0779876543', 'designer'),
	(DEFAULT, 'test4@123', 'testuser4@gmail.com', 'Female', '1995-03-15', 'Michael', 'Johnson', '0777654321', 'user'),
	('uploads/profile-pictures/user4.jpg', 'test5@123', 'testuser5@gmail.com', 'Male', '2002-11-07', 'Emily', 'Anderson', '0771112222', 'user'),
	(DEFAULT, 'test6@123', 'testuser6@gmail.com', 'Female', '1997-08-25', 'David', 'Wilson', '0773334444', 'user'),
	(DEFAULT, 'test7@123', 'testuser7@gmail.com', 'Male', '2000-02-17', 'Sophia', 'Taylor', '0775556666', 'user');



-- create faq data table
CREATE TABLE faq `social_ad_wizards`.`faq` (
	`faq_id` INT NOT NULL AUTO_INCREMENT ,
	`s_user_id` INT NOT NULL ,
	`question` VARCHAR(1000) NOT NULL ,
	`answer` VARCHAR(1000) DEFAULT NULL ,
	PRIMARY KEY (`faq_id`)) ENGINE = InnoDB;







-- Create FAQ table
CREATE TABLE FAQ (
	FAQ_ID int IDENTITY(1,1),
	Manager_ID int NOT NULL,
	Question varchar(1000) NOT NULL,
	Answer varchar(1000),
	CONSTRAINT FAQ_PK PRIMARY KEY(FAQ_ID),
	CONSTRAINT FAQ_FK1 FOREIGN KEY(Manager_ID) REFERENCES Manager(Manager_ID),
);























CREATE TABLE Registered_User (
	S_User_ID int IDENTITY(1,1),
	Registerd_Date Date NOT NULL DEFAULT GETDATE(),
	Profile_Picture varchar(100),
	User_Pass varchar(30) NOT NULL,
	Email varchar(100) CHECK (Email LIKE '%@%.%' AND Email NOT LIKE '%@%@%') NOT NULL,
	Gender varchar(6) NOT NULL,
	Date_Of_Birth Date NOT NULL,
	First_Name varchar(20) NOT NULL,
	Last_Name varchar(20) NOT NULL,
	Phone_No varchar(10) NOT NULL,
	User_Role varchar(10) NOT NULL,
	CONSTRAINT Registered_User_PK PRIMARY KEY(S_USER_ID),
);

-- Create Order info table
CREATE TABLE Order_Info (
	Order_ID int IDENTITY(1,1),
	S_User_ID int NOT NULL,
	Order_Date Date NOT NULL DEFAULT GETDATE(),
	Order_Status varchar(50) NOT NULL,
	Ad_Platform varchar(50) NOT NULL,
	Order_Desc varchar(3000) NOT NULL,
	Category varchar(50) NOT NULL,
	Ad_Format varchar(20) NOT NULL,
	CONSTRAINT Order_Info_PK PRIMARY KEY(Order_ID),
	CONSTRAINT Order_Info_FK1 FOREIGN KEY(S_User_ID) REFERENCES Registered_User(S_User_ID)
);

-- Create Document table
CREATE TABLE Document (
	Document_ID int IDENTITY(1,1),
	Order_ID int NOT NULL,
	Document_Type varchar(100) NOT NULL,
	CONSTRAINT Document_PK PRIMARY KEY(Document_ID),
	CONSTRAINT Document_FK1 FOREIGN KEY(Order_ID) REFERENCES Order_Info(Order_ID)
);

-- Create Manager table
CREATE TABLE Manager (
	Manager_ID int IDENTITY(1,1),
	S_User_ID int NOT NULL,
	Bio_Data varchar(1000),
	CONSTRAINT Manager_PK PRIMARY KEY(Manager_ID),
	CONSTRAINT Manager_FK1 FOREIGN KEY(S_User_ID) REFERENCES Registered_User(S_User_ID)
);

-- Create Offer table
CREATE TABLE Offer (
	Offer_ID int IDENTITY(1,1),
	Manager_ID int NOT NULL,
	Offer_Percentage float NOT NULL,
	O_Start_Date Date NOT NULL DEFAULT GETDATE(),
	End_Date Date,
	CONSTRAINT Offer_PK PRIMARY KEY(Offer_ID),
	CONSTRAINT Offer_FK1 FOREIGN KEY(Manager_ID) REFERENCES Manager(Manager_ID)
);

-- Create Payment table
CREATE TABLE Payment (
	Payment_ID int IDENTITY(1,1),
	Order_ID int NOT NULL,
	Offer_ID int,
	Payment_Amount float NOT NULL,
	Payment_Date Date NOT NULL DEFAULT GETDATE(),
	CONSTRAINT Payment_PK PRIMARY KEY(Payment_ID),
	CONSTRAINT Payment_FK1 FOREIGN KEY(Order_ID) REFERENCES Order_Info(Order_ID),
	CONSTRAINT Payment_FK2 FOREIGN KEY(Offer_ID) REFERENCES Offer(Offer_ID)
);

-- Create Designer table
CREATE TABLE Designer (
	Designer_ID int IDENTITY(1,1),
	Bio_Data varchar(1000) DEFAULT 'No data',
	Experience varchar(1000) DEFAULT 'No data',
	CONSTRAINT Designer_PK PRIMARY KEY(Designer_ID),
);

-- Create Sample gallery table
CREATE TABLE Sample_Gallery (
	Item_ID int IDENTITY(1,1),
	Designer_ID int NOT NULL,
	Review int DEFAULT 0,
	Document varchar(100) NOT NULL,
	Title varchar(50) NOT NULL,
	CONSTRAINT Sample_Gallery_PK PRIMARY KEY(Item_ID),
	CONSTRAINT Sample_Gallery_FK1 FOREIGN KEY(Designer_ID) REFERENCES Designer(Designer_ID)
);

-- Create Design table
CREATE TABLE Design (
	Design_ID int IDENTITY(1,1),
	Order_ID int NOT NULL,
	Design_Content varchar(100) NOT NULL,
	CONSTRAINT Design_PK PRIMARY KEY(Design_ID),
	CONSTRAINT Design_FK2 FOREIGN KEY(Order_ID) REFERENCES Order_Info(Order_ID),
);

-- Create Release table
CREATE TABLE Release (
	Designer_ID int NOT NULL,
	Design_ID int NOT NULL,
	Released_Date Date NOT NULL DEFAULT GETDATE(),
	CONSTRAINT Release_PK PRIMARY KEY(Designer_ID, Design_ID),
	CONSTRAINT Release_FK1 FOREIGN KEY(Designer_ID) REFERENCES Designer(Designer_ID),
	CONSTRAINT Release_FK2 FOREIGN KEY(Design_ID) REFERENCES Design(Design_ID)
);

-- Create FAQ table
CREATE TABLE FAQ (
	FAQ_ID int IDENTITY(1,1),
	Manager_ID int NOT NULL,
	Question varchar(1000) NOT NULL,
	Answer varchar(1000),
	CONSTRAINT FAQ_PK PRIMARY KEY(FAQ_ID),
	CONSTRAINT FAQ_FK1 FOREIGN KEY(Manager_ID) REFERENCES Manager(Manager_ID),
);



/* Insert Data */

-- Insert data into Registered_User table
INSERT INTO Registered_User (Profile_Picture, User_Pass, Email, Gender, Date_Of_Birth, First_Name, Last_Name, Phone_No, User_Role)
VALUES 
    ('www.link.com/profile1.jpg', 'userpass1', 'john@gmail.com', 'Male', '2000-01-01', 'John', 'Doe', '0771234567', 'Designer'),
    ('www.link.com/profile2.jpg', 'pass123', 'smith@yahoo.com', 'Female', '1998-01-02', 'Jane', 'Smith', '0719723453', 'Manager'),
    ('www.link.com/profile3.jpg', 'Michael123', 'johnson123@gmail.com', 'Male', '1999-05-03', 'Michael', 'Johnson', '0745723453', 'User'),
    ('www.link.com/profile4.jpg', 'davis@345', 'emily@gmail.com', 'Female', '2000-01-04', 'Emily', 'Davis', '0719729863', 'User'),
    ('www.link.com/profile5.jpg', 'man543', 'david@gmail.com', 'Male', '2000-11-05', 'David', 'Anderson', '0719635453', 'User');


-- Insert data into Order_Info table
INSERT INTO Order_Info (S_User_ID, Order_Status, Ad_Platform, Order_Desc, Category, Ad_Format)
VALUES
    (1, 'Completed', 'Facebook', 'Ad campaign for product launch', 'Marketing', 'Picture'),
    (2, 'Completed', 'Facebook', 'Ad campaign for summer sale', 'Promotions', 'Picture'),
    (3, 'Pending Approval', 'Instagram', 'Ad campaign for new collection', 'Fashion', 'Video'),
    (3, 'Approved', 'YouTube', 'Ad campaign for video promotion', 'Entertainment', 'Picture'),
    (5, 'Pending Approval', 'LinkedIn', 'Ad campaign for professional services', 'Business', 'Picture');
	
-- Insert data into Document table
INSERT INTO Document (Order_ID, Document_Type)
VALUES
    (1, 'www.link.com/doc1.jpg'),
    (2, 'www.link.com/doc2.png'),
    (3, 'www.link.com/doc3.mp4'),
    (4, 'www.link.com/doc4.png'),
    (5, 'www.link.com/doc5.png');

-- Insert data into Manager table
INSERT INTO Manager (S_User_ID, Bio_Data)
VALUES
    (1, 'Experienced manager with a proven track record.'),
    (2, 'Passionate about leadership and team development.'),
    (3, 'Skilled in strategic planning and problem-solving.'),
    (4, 'Excellent communication and interpersonal skills.'),
    (5, 'Strong organizational and decision-making abilities.');

-- Insert data into Offer table
INSERT INTO Offer (Manager_ID, Offer_Percentage, End_Date)
VALUES
    (1, 15.5, '2023-06-30'),
    (2, 12.75, '2023-07-15'),
    (2, 20.0, '2023-06-25'),
    (3, 18.25, '2023-07-10'),
    (5, 14.0, '2023-07-05');

-- Insert data into Payment table
INSERT INTO Payment (Order_ID, Offer_ID, Payment_Amount)
VALUES
    (1, 1, 10000.0),
    (2, 2, 7500.5),
    (3, NULL, 5000.0),
    (4, 3, 12000.25),
    (5, 4, 9000.75);

-- Insert data into Designer table
INSERT INTO Designer (Bio_Data, Experience)
VALUES
    ('5 years of experience', 'Adobe Photoshop, Illustrator, InDesign'),
    ('3 years of experience', 'Sketch, Figma, Adobe XD'),
    ('10 years of experience', 'AutoCAD, 3ds Max, SolidWorks'),
    ('2 years of experience', 'HTML, CSS, JavaScript'),
    ('7 years of experience', 'UI/UX design, Wireframing, Prototyping');

-- Insert data into Sample_Gallery table
INSERT INTO Sample_Gallery (Designer_ID, Review, Document, Title)
VALUES
    (1, 4, 'www.link.com/sample1.img', 'Fashion'),
    (2, 3, 'www.link.com/sample2.mp4', 'Pet Care'),
    (3, 3, 'www.link.com/sample3.img', 'Medical'),
    (5, 2, 'www.link.com/sample4.mp4', 'Channeling'),
    (5, 1, 'www.link.com/sample5.img', 'Fashion');

/* Insert data into Design table */
INSERT INTO Design (Order_ID, Design_Content)
VALUES 
    (1, 'Design content 1'),
    (2, 'Design content 2'),
    (3, 'Design content 3'),
    (4, 'Design content 4'),
    (5, 'Design content 5');

/* Insert data into Release table */
INSERT INTO Release (Designer_ID, Design_ID, Released_Date)
VALUES 
    (1, 1, '2023-05-01'),
    (2, 2, '2023-04-02'),
    (2, 3, '2023-03-23'),
    (4, 4, '2023-01-04'),
    (5, 5, '2023-02-15');

/* Insert data into FAQ table */
INSERT INTO FAQ (Manager_ID, Question, Answer)
VALUES 
    (1, 'How do I place an order?', 'You can place an order by visiting our website and following the instructions provided.'),
    (1, 'What payment methods do you accept?', 'We accept credit cards, PayPal, and bank transfers as payment methods.'),
    (2, 'Can I cancel my order?', 'Yes, you can cancel your order within 24 hours of placing it.'),
    (2, 'How long does shipping take?', 'Shipping typically takes 3-5 business days, depending on your location.'),
    (3, 'Do you offer international shipping?', 'Yes, we offer international shipping to select countries. Please contact our customer support for more information.');