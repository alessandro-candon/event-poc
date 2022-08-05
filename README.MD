# POC to start the architecture of events

## Framework or Library events

All what concerns "Events" is stored inside the Events folder.

Inside you can find :
* CustomHandler : all events of application level -> send email, react some other events in async way, ecc.. We use it mostly for ASYC.
* EntityHandler : all events related to entities -> create, update, delate.
* Shared : all stuff to let events works propriety


Shared :
* AsyncMessageInterface : implements this empty interface to allow "asyc" messages
* EventPriority : is constant set of priorities. In our software the priority is not important however in some other cases yes, so use how much priorities you need.


CustomHandler: you can also have some subfolders to define a specific event of that domain


## How it works 

Run this command to setup the environment and test it :
```
make up
make enter
composer install
php bin/console d:d:c
php bin/console d:s:c
php bin/console d:s:u --force
```

To start the consumer:
```
php bin/console messenger:consume async -vv
```
