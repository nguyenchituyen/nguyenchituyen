# Scubism Back-End

## Getting start

 ####--Step 1: Create file ``.env``
 - Coppy file ``.env.example`` and change name become ``.env``
 
 - Inside file ``.env``
 ```
    Change
    
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret
    
    To 
    
    DB_DATABASE=scubism
    DB_USERNAME=root
    DB_PASSWORD=
 ```
 
 ####--Step 2: Run Project
 
 - Use syntax ``vagrant up``.
 - When you run `vagrant up`, provision would been run too. Everything have been installed.
 - Go to: ``http://11.11.11.11``.
 - Account: ``admin@s-cubism.jp``.
 - Password: ``admin``.
  
 ####--Note
  
  - After login if don't have permission access to any function. Perform the following steps
  
 ```
    On menu bar click to "Role Action' -> "Assign Role Action" 
    
    In row have email is "admin@scubism.jp" click to button "Assign role"
    
    Choose all and save
 ```
## Database

We use mariadb (mysql dev)
```
# Account
#   username: root
#   pass:
# run cmd
#   mysql -uroot
```

## Setup adminer
```
# ./adminer.sh
```

