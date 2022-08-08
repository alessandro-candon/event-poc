# POC to start the architecture of events

## Framework or Library events

All what concerns "Events" is stored inside the Events folder.

The event that will be dispatched should respect this convention :
* Extends Sync or Async message interface to be (of course) sync or async consumed
* Ends with *Event* suffix
* Named as "past"


Inside you can find :
* CustomHandler : all events of application level -> send email, react some other events in async way, ecc.. We use it mostly for ASYC.
* EntityHandler : all events related to entities -> create, update, delete.
* Shared : all stuff to let events works propriety


Shared :
* AsyncMessageInterface : implements this empty interface to allow "asyc" messages
* SyncMessageInterface : implements this empty interface to allow "sync" messages
* GlobalEventsCollector : let you to collect events, in this way you don't need to inject symfony bus message
* GlobalEventDispatcher : listen the `onKernelResponse`, this event is dispatched after the controller or any kernel.view listener returns a Response object. This let consume all events stored in the collector.
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
