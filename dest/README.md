# Minimum system requirements
October CMS has some server requirements for web hosting:

PHP version 7.2 or higher  
PDO PHP Extension (and relevant driver for the database you want to connect to)  
cURL PHP Extension  
OpenSSL PHP Extension  
Mbstring PHP Extension  
ZipArchive PHP Extension  
GD PHP Extension  
SimpleXML PHP Extension  

# Troubleshooting installation

- A blank screen is displayed when opening the application: Check the permissions are set correctly on the /storage files and folders, they should be writable for the web server.
- The back-end area displays "Page not found" (404): If the application cannot find the database then a 404 page will be shown for the back-end. Try enabling debug mode to see the underlying error message.



# How to deploy

1. Run deployer script  
```bash deployer.sh my_project git@github.com:user/my_project.git```

2. Edit .env file  
Change:
- `DB_USERNAME=`
- `DB_PASSWORD=`  
- `APP_DEBUG=true` to `APP_DEBUG=false`
- `APP_URL=http://localhost`

3. Dump database from development machine and copy to production database.

```
pg_dump --host=192.168.83.21 --dbname=my_project --port=5432 --username=postgres --password > my_project
```
copy file to production and execute
```
psql --host= --port=5432 --username= --password dbname < my_project
```

4. Start configurator
```bash configurator.sh my_project```

