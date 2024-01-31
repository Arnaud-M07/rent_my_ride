#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: cities
#------------------------------------------------------------

CREATE TABLE cities(
        id_city  Int  Auto_increment  NOT NULL ,
        name     Varchar (255) NOT NULL ,
        zip_code Varchar (255) NOT NULL
	,CONSTRAINT cities_PK PRIMARY KEY (id_city)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: types
#------------------------------------------------------------

CREATE TABLE types(
        id_type Int  Auto_increment  NOT NULL ,
        name    Varchar (255) NOT NULL
	,CONSTRAINT types_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: equipments
#------------------------------------------------------------

CREATE TABLE equipments(
        id_equipment Int  Auto_increment  NOT NULL ,
        name         Varchar (100) NOT NULL
	,CONSTRAINT equipments_PK PRIMARY KEY (id_equipment)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: included_services
#------------------------------------------------------------

CREATE TABLE included_services(
        id_included_service Int  Auto_increment  NOT NULL ,
        name                Varchar (100)
	,CONSTRAINT included_services_PK PRIMARY KEY (id_included_service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: countries
#------------------------------------------------------------

CREATE TABLE countries(
        id_country Int  Auto_increment  NOT NULL ,
        name       Varchar (50) NOT NULL
	,CONSTRAINT countries_PK PRIMARY KEY (id_country)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: number_of_rooms
#------------------------------------------------------------

CREATE TABLE number_of_rooms(
        id_number_of_room Int  Auto_increment  NOT NULL ,
        number_of_room    Int NOT NULL
	,CONSTRAINT number_of_rooms_PK PRIMARY KEY (id_number_of_room)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users_roles
#------------------------------------------------------------

CREATE TABLE users_roles(
        id_user_role Int  Auto_increment  NOT NULL ,
        name         Varchar (50) NOT NULL
	,CONSTRAINT users_roles_PK PRIMARY KEY (id_user_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: users
#------------------------------------------------------------

CREATE TABLE users(
        id_user        Int  Auto_increment  NOT NULL ,
        firstname      Varchar (100) NOT NULL ,
        lastname       Varchar (100) NOT NULL ,
        email          Varchar (255) NOT NULL ,
        password       Varchar (255) NOT NULL ,
        phone          Varchar (20) ,
        birthdate      Date ,
        nationality    Varchar (50) ,
        id_card        Varchar (255) ,
        profil_picture Varchar (255) ,
        description    Longtext ,
        created_at     Datetime NOT NULL ,
        updated_at     Datetime NOT NULL ,
        deleted_at     Datetime ,
        id_user_role   Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id_user)

	,CONSTRAINT users_users_roles_FK FOREIGN KEY (id_user_role) REFERENCES users_roles(id_user_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: colivings
#------------------------------------------------------------

CREATE TABLE colivings(
        id_coliving        Int  Auto_increment  NOT NULL ,
        name               Varchar (255) NOT NULL ,
        description        Longtext NOT NULL ,
        street_name        Varchar (255) NOT NULL ,
        street_number      Int NOT NULL ,
        latitude_longitude Varchar (50) NOT NULL ,
        picture            Varchar (5) NOT NULL ,
        rules              Longtext NOT NULL ,
        created_at         Datetime NOT NULL ,
        updated_at         Datetime NOT NULL ,
        deleted_at         Datetime ,
        id_type            Int NOT NULL ,
        id_city            Int NOT NULL ,
        id_user            Int NOT NULL ,
        id_country         Int NOT NULL
	,CONSTRAINT colivings_PK PRIMARY KEY (id_coliving)

	,CONSTRAINT colivings_types_FK FOREIGN KEY (id_type) REFERENCES types(id_type)
	,CONSTRAINT colivings_cities0_FK FOREIGN KEY (id_city) REFERENCES cities(id_city)
	,CONSTRAINT colivings_users1_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT colivings_countries2_FK FOREIGN KEY (id_country) REFERENCES countries(id_country)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rooms
#------------------------------------------------------------

CREATE TABLE rooms(
        id_room          Int  Auto_increment  NOT NULL ,
        description      Longtext NOT NULL ,
        night_price      Int NOT NULL ,
        month_price      Int NOT NULL ,
        private_bathroom Bool NOT NULL ,
        private_toilet   Bool NOT NULL ,
        availability     Bool NOT NULL ,
        picture          Varchar (255) NOT NULL ,
        created_at       Datetime NOT NULL ,
        updated_at       Datetime NOT NULL ,
        deleted_at       Datetime ,
        id_coliving      Int NOT NULL
	,CONSTRAINT rooms_PK PRIMARY KEY (id_room)

	,CONSTRAINT rooms_colivings_FK FOREIGN KEY (id_coliving) REFERENCES colivings(id_coliving)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: bookings
#------------------------------------------------------------

CREATE TABLE bookings(
        id_booking   Int  Auto_increment  NOT NULL ,
        check_in     Datetime NOT NULL ,
        check_out    Datetime NOT NULL ,
        price        Int NOT NULL ,
        status       Bool NOT NULL ,
        confirmed_at Datetime ,
        paid_at      Datetime ,
        remit_at     Datetime ,
        created_at   Datetime NOT NULL ,
        updated_at   Datetime NOT NULL ,
        deleted_at   Datetime ,
        id_user      Int NOT NULL ,
        id_room      Int NOT NULL
	,CONSTRAINT bookings_PK PRIMARY KEY (id_booking)

	,CONSTRAINT bookings_users_FK FOREIGN KEY (id_user) REFERENCES users(id_user)
	,CONSTRAINT bookings_rooms0_FK FOREIGN KEY (id_room) REFERENCES rooms(id_room)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: reviews
#------------------------------------------------------------

CREATE TABLE reviews(




	=======================================================================
	   Désolé, il faut activer cette version pour voir la suite du script ! 
	=======================================================================
