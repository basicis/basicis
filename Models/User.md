# App\Models\User  

Model class

## Implements:
Basicis\Auth\AuthInterface, Stringable, Basicis\Model\ModelInterface

## Extend:

Basicis\Auth\Auth

## Methods

| Name | Description |
|------|-------------|
|[getFirstName](#usergetfirstname)||
|[getLastName](#usergetlastname)||
|[setFirstName](#usersetfirstname)||
|[setLastName](#usersetlastname)||

## Inherited methods

| Name | Description |
|------|-------------|
|__construct|Function __construct
Run parent Basicis\Model\Model::__construct method with $data [array|int(id)] as argument|
|__toArray|Function __toArray
Get Entity Data as Array, without the propreties defined in the array property $protecteds|
|__toString|Function __toString
Get Entity Data as Json, without the propreties defined in the array property $protecteds|
|all|Function all
Find all entities|
|checkPass|Function checkPass
Check Auth password key|
|delete|Function delete
Remove data of this entity of database|
|find|Function find
Find a entity by id|
|findBy|Function findBy
Find all entities by any column match|
|findOneBy|Function findOneBy
Find a entity by any column match|
|getCreated|Function getCreated
Return entity created timestamp|
|getEmail|Function getEmail
Get Auth email key|
|getId|Function getId
Return entity ID (unique on system identification)|
|getManager|Function getManager
Get a instance of Doctrine ORM EntityManager an return this, or null|
|getRole|Function getRole
Get role permission ID|
|getRoleName|Function getRoleName
Get role permission Name|
|getUpdated|Get updated.|
|getUser|Function getUser
Get a Auth User by token and appKey|
|getUsername|Function getUsername
Get Auth username key|
|login|Function function
Check  Auth User and return a string token of on success or null in error case|
|save|Function save
Save data of this entity to database, use for create or update entities|
|setCreated|Function setCreated.|
|setEmail|Function setEmail
Set Auth email key|
|setPass|Function setPass
Set Auth password key|
|setRole|Function setRole
Set role permission ID includes is Default roles permissions IDs 'DEFAULT_ROLES' or optional > 5|
|setUpdated|Function setUpdated
Return entity updated timestamp|
|setUsername|Function setUsername
Set Auth username key|



### User::getFirstName  

**Description**

```php
 getFirstName (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


### User::getLastName  

**Description**

```php
 getLastName (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


### User::setFirstName  

**Description**

```php
 setFirstName (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />


### User::setLastName  

**Description**

```php
 setLastName (void)
```

 

 

**Parameters**

`This function has no parameters.`

**Return Values**

`void`


<hr />

