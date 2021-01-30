# App\Models\User  

User class

## Implements:
Basicis\Auth\AuthInterface, Stringable, Basicis\Model\ModelInterface

## Extend:

Basicis\Auth\User

## Methods

| Name | Description |
|------|-------------|

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
|allToArray|Function all
Find all entities, and return a array or null|
|checkPass|Function checkPass
Check User password key|
|delete|Function delete
Remove data of this entity of database|
|exists|Function exists
Check if a entity by any column match|
|find|Function find
Find a entity by id|
|findBy|Function findBy
Find all entities by any column match|
|findOneBy|Function findOneBy
Find a entity by any column match|
|getCreated|Function getCreated
Return entity created timestamp|
|getEmail|Function getEmail
Get User email|
|getFirstName|Function getFirstName
Get user first name|
|getId|Function getId
Return entity ID (unique on system identification)|
|getLastName|Function getLastName
Get user last name|
|getManager|Function getManager
Get a instance of Doctrine ORM EntityManager an return this, or null|
|getPropertyAnnotation|Function getPropertyAnnotation
Get a array with property annotations data by prop and tag names, default tag `Column`|
|getProtecteds|Function getProtecteds
Get protecteds properties|
|getRole|Function getRole
Get role permission ID|
|getRoleName|Function getRoleName
Get role permission Name|
|getTableName|Function getTableName
Get entity table name|
|getUpdated|Function getUpdated
Return entity updated timestamp|
|getUsername|Function getUsername
Get User username|
|paginate|Function paginate
Paginate entity search with start offset (0) and total, this is ten (10) by default|
|query|Function query
Execute a sql query string|
|removeProtecteds|Function removeProtecteds
Get Entity Data as Array, without the propreties defined in the array property $protecteds|
|save|Function save
Save data of this entity to database, use for create or update entities|
|setCreated|Function setCreated
Set entity creation timestamp|
|setEmail|Function setEmail
Set User email|
|setFirstName|Function setFirstName
Set user first name|
|setLastName|Function setLastName
Set user last name|
|setPass|Function setPass
Set User password key|
|setRole|Function setRole
Set role permission ID includes is Default roles permissions IDs 'DEFAULT_ROLES' or optional > 5|
|setUpdated|Function setUpdated
Set entity updated timestamp|
|setUsername|Function setUsername
Set User username|


