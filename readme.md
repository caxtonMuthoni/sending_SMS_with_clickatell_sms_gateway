[Check the hosted version here](https://smswithclickatell.herokuapp.com/)

# How to run the code

## database
Create the database with name sms and then import the sql in the Database folder.
Alternatively, You can use the commands below:
### MYSQL:
```sql
CREATE TABLE sms.smses ( id BIGINT NOT NULL AUTO_INCREMENT , sms_id TEXT NOT NULL , phone VARCHAR(20) NOT NULL , sms TEXT NOT NULL , delivery VARCHAR(20) NOT NULL , created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (id)) ENGINE = InnoDB;
```

### POSTGRESS:
```sql
 CREATE TABLE smses (
 	id serial PRIMARY KEY,
 	sms_id TEXT UNIQUE NOT NULL,
 	phone VARCHAR ( 50 ) NOT NULL,
 	sms TEXT UNIQUE NOT NULL,
 	delivery VARCHAR ( 50 ) NOT NULL,
 	created_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP
 );

 ```

 