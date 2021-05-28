# AddressBook.Laravel

## Overview

This repository contains **Address Book** application for Laravel that shows design & coding practices followed by **[Differenz System](http://www.differenzsystem.com/)**.


The app does the following:
1. **Login:** User can login via emailId/password. 
2. **Get All Address:** It will list all the save contacts, having the option to add a new contact.
3. **Create new contact:** User can add a new contact to his address book by filling detail.


## Pre-requisites
-[Visual Studio code](https://code.visualstudio.com/)
-[ Laravel ](https://laravel.com/)
-[ MySql ](https://www.mysql.com/)


## Getting Started
1. [Install Visual Studio code](https://code.visualstudio.com/) Editor.
2. Clone this sample repository in to the PHP configuration folder
3. Open Terminal, go to location of the repo
4. Install [Composer](https://getcomposer.org/). If you don't have a composer in the machine.
4. Enter command for install the 'Composer Update' (make sure to go inside project first). It will add required file in the Project.
5. Create database 'address_book' in PhpMyAdmin Panel.
6. Enter Command in CMD 'php artisan migrate' for create table in the database.


## Key Tools & Technologies
- **Database:** MySql
- **Authentication:** login
- **API/Service calls:** fetch API
- **IDE:**  VSCode
- **Framework:** Laravel

Now call the API one by one.

##API
### Register New user
Registration: 
http://localhost:8181/addressbook/public/api/RegisterUser

**Request:**
```
    {        
        "first_name":"test",
        "last_name":"test",
        "email_id":"test@differenzsystem.com",
        "password":"password123",
    }
```

**Response:**
```
	{
        "IsSuccess": 1,
        "data": {
            "user_id": 1
        },
        "msg": "Registered successfully"
    }
```

###
login:
http://localhost:8181/addressbook/public/api/login

**Request:**
```
    {
        "email_id":"test@differenzsystem.com",
        "password":"password123"
    }
```
**Response:**
```
    {
		"IsSuccess": 1,
        "data": {
            "user_id": 1
        },
        "msg": "Successfully logged-in"
    }
```
###


Display address by user_id:
http://localhost:8181/addressbook/public/api/GetAddressBookList

**Request:**
```
    {
        "user_id":1
    }
```

**Response:**
```
    {
        "IsSuccess": 1,
        "data": [
            {
            "address_book_id": 1,
            "user_id": 1,
            "first_name": "tom",
            "last_name": "joseph",
            "email_id": "tom@differenzsystem.com",
			"contact_no":9898989898
            "is_active": 1
            },
            {
            "address_book_id": 2,
            "user_id": 1,
            "first_name": "Mark",
            "last_name": "joseph",
            "email_id": "mark@differenzsystem.com",
			"contact_no":9797979797
            "is_active": 1
            }
        ],
        "msg": "success"
    }
```

###
Add Address
http://localhost:8181/addressbook/public/api/AddAddressBook

**Request:**
```
    {
		"address_book_id" : 0, // To add pass 0
        "user_id":"test",
        "email_id":"test",
        "first_name":"test@gmail.com",
		"last_name":"test@gmail.com",
		"is_active":1,
        "contact_no":"7878985845",
    }
```
**Response:**
```
    {
        "IsSuccess": 1,
        "msg": "Address Book added successfully"
    }
```

###
Update Address
http://localhost:8181/addressbook/public/api/AddAddressBook

**Request:**
```
    {
        "address_book_id" : 1, // For Update pass address_book_id
        "user_id":"test",
        "email_id":"test",
        "first_name":"test@gmail.com",
		"last_name":"test@gmail.com",
		"is_active":1,
        "contact_no":"7878985845",
    }
```

**Response:**
```
    {
        "IsSuccess": 1,
        "msg": "Address Book updated successfully"
    }
```

###
Delete Address (Http Method DELETE)
http://localhost:8181/addressbook/public/api/DeleteAddressBookById

**Request:**
```
    {
        "address_book_id":1
    }
```
**Response:**
```
    {
        "IsSuccess": 0,
        "msg": "Deleted successfully"
    }
```


## Support
If you've found an error in this sample, please [report an issue](https://differenz-system:welcome007@github.com/differenz-system/AddressBook.Laravel.git).  You can also send your feedback and suggestions at info@differenzsystem.com

Happy coding!